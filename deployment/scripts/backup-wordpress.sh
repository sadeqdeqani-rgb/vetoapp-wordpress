#!/bin/sh
set -eu

umask 077

: "${WORDPRESS_DB_HOST:?WORDPRESS_DB_HOST is required}"
: "${WORDPRESS_DB_NAME:?WORDPRESS_DB_NAME is required}"
: "${WORDPRESS_DB_USER:?WORDPRESS_DB_USER is required}"
: "${WORDPRESS_DB_PASSWORD:?WORDPRESS_DB_PASSWORD is required}"

backup_dir="${WORDPRESS_BACKUP_DIR:-/backups}"
metrics_dir="${WORDPRESS_BACKUP_METRICS_DIR:-/metrics}"
retention_days="${WORDPRESS_BACKUP_RETENTION_DAYS:-14}"
database_port="${WORDPRESS_DB_PORT:-3306}"
uploads_root="${WORDPRESS_ROOT:-/var/www/html}/wp-content"

case "$retention_days" in
  ''|*[!0-9]*)
    echo "WORDPRESS_BACKUP_RETENTION_DAYS must be a non-negative integer." >&2
    exit 64
    ;;
esac

mkdir -p "$backup_dir" "$metrics_dir"
timestamp="$(date -u +%Y%m%dT%H%M%SZ)"
work_dir="$(mktemp -d "$backup_dir/.wordpress-${timestamp}.XXXXXX")"
archive_file="$backup_dir/wordpress-${timestamp}.tar.gz"

cleanup() {
  rm -rf "$work_dir"
}
trap cleanup EXIT INT TERM

export MYSQL_PWD="$WORDPRESS_DB_PASSWORD"
mariadb-dump \
  --host="$WORDPRESS_DB_HOST" \
  --port="$database_port" \
  --user="$WORDPRESS_DB_USER" \
  --single-transaction \
  --quick \
  --routines \
  --events \
  --triggers \
  --default-character-set=utf8mb4 \
  "$WORDPRESS_DB_NAME" | gzip -9 > "$work_dir/database.sql.gz"
unset MYSQL_PWD

gzip -t "$work_dir/database.sql.gz"

if [ -d "$uploads_root/uploads" ]; then
  tar -C "$uploads_root" -czf "$work_dir/uploads.tar.gz" uploads
else
  tar -czf "$work_dir/uploads.tar.gz" --files-from /dev/null
fi

tar -C "$work_dir" -czf "${archive_file}.tmp" database.sql.gz uploads.tar.gz
mv "${archive_file}.tmp" "$archive_file"

if [ -n "${WORDPRESS_BACKUP_ENCRYPTION_PASSPHRASE:-}" ]; then
  encrypted_file="${archive_file}.enc"
  openssl enc -aes-256-cbc -salt -pbkdf2 -iter 200000 \
    -pass env:WORDPRESS_BACKUP_ENCRYPTION_PASSPHRASE \
    -in "$archive_file" \
    -out "${encrypted_file}.tmp"
  rm -f "$archive_file"
  mv "${encrypted_file}.tmp" "$encrypted_file"
  archive_file="$encrypted_file"
fi

sha256sum "$archive_file" > "${archive_file}.sha256"
find "$backup_dir" -maxdepth 1 -type f -name 'wordpress-*' -mtime "+$retention_days" -delete

metrics_file="$metrics_dir/wordpress_backup.prom"
metrics_temporary_file="${metrics_file}.tmp"
{
  echo '# HELP wordpress_backup_last_success_unixtime Unix time of the latest completed WordPress backup.'
  echo '# TYPE wordpress_backup_last_success_unixtime gauge'
  printf 'wordpress_backup_last_success_unixtime %s\n' "$(date -u +%s)"
  echo '# HELP wordpress_backup_last_size_bytes Size in bytes of the latest completed WordPress backup.'
  echo '# TYPE wordpress_backup_last_size_bytes gauge'
  printf 'wordpress_backup_last_size_bytes %s\n' "$(wc -c < "$archive_file")"
} > "$metrics_temporary_file"
mv "$metrics_temporary_file" "$metrics_file"

echo "WordPress backup completed: $archive_file"
