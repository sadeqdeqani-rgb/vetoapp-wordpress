#!/bin/sh
set -eu

interval="${WORDPRESS_BACKUP_INTERVAL_SECONDS:-86400}"

case "$interval" in
  ''|*[!0-9]*|0)
    echo "WORDPRESS_BACKUP_INTERVAL_SECONDS must be a positive integer." >&2
    exit 64
    ;;
esac

while true; do
  /usr/local/bin/vetoapp-wordpress-backup
  sleep "$interval"
done
