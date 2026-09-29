#!/bin/sh
set -eu

source_dir="/usr/src/wordpress/wp-content/themes/vetoapp-landing"
destination_dir="/var/www/html/wp-content/themes/vetoapp-landing"

if [ ! -d "$source_dir" ]; then
  echo "Bundled VetoApp theme is missing from the image." >&2
  exit 66
fi

mkdir -p "$destination_dir"
cp -a "$source_dir/." "$destination_dir/"
chown -R www-data:www-data "$destination_dir" || true

echo "VetoApp WordPress theme synchronized."
