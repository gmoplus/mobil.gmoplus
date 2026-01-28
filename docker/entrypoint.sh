#!/bin/bash
set -e

# Logo/Info
echo "Starting Flynax Entrypoint..."

# Create Smarty/System directories
echo "Creating required directories..."
mkdir -p /var/www/html/tmp/compile
mkdir -p /var/www/html/tmp/cache
mkdir -p /var/www/html/tmp/aCompile
mkdir -p /var/www/html/tmp/errorLog
mkdir -p /var/www/html/tmp/upload
mkdir -p /var/www/html/tmp/sessions
mkdir -p /var/www/html/files

# Set Permissions
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/tmp
chmod -R 777 /var/www/html/tmp

# Try to set permissions for files (might fail if read-only mount, suppression is safer)
chown -R www-data:www-data /var/www/html/files || true
chmod -R 777 /var/www/html/files || true

# Generate ASCII aliases for files with encoding issues (idempotent)
if [ -f /var/www/html/tools/make_ascii_aliases.php ]; then
    echo "Generating ASCII aliases for mojibake filenames..."
    php /var/www/html/tools/make_ascii_aliases.php || true
fi

# Execute the main command
echo "Executing command: $@"
exec "$@"
