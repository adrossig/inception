# !/bin/sh

# Check Whether Change on Configuration File is Needed or Not
grep -E "listen = 127.0.0.1" /etc/php7/php-fpm.d/www.conf > /dev/null 2>&1

# If Configuration File Needs to be Changed
if [ $? -eq 0 ]; then
  # Change the Listening Host with 9000 Port
  sed -i "s/.*listen = 127.0.0.1.*/listen = 9000/g" /etc/php7/php-fpm.d/www.conf
  # Append Env Variables on the Configuration File
  echo "env[MARIADB_HOST] = \$mariadb" >> /etc/php7/php-fpm.d/www.conf
  echo "env[MARIADB_USER] = \$SQL_USER" >> /etc/php7/php-fpm.d/www.conf
  echo "env[MARIADB_PWD] = \$SQL_PASSWORD" >> /etc/php7/php-fpm.d/www.conf
  echo "env[MARIADB_DB] = \$SQL_DATABASE" >> /etc/php7/php-fpm.d/www.conf
fi

# Check Whether Another Configuration File Exists or Not
if [ ! -f "/var/www/wordpress/wp-config.php" ]; then
  # Copy Configuration File
  cp /tmp/wp-config.php /var/www/wordpress/wp-config.php
  # Wait MariaDB to be Prepared (MariaDB Container is Running Daemon by the Script, not Daemon Directly)
  sleep 5;
  # Check Whether Database Server is Alive or Not
  if ! mysqladmin -h mariadb -u $SQL_USER --password=$SQL_PASSWORD --wait=60 ping > /dev/null; then
    printf "MariaDB Daemon Unreachable\n"
    exit 1
  fi
  # WordPress Stuffs
  wp core install --url="https://arossign.42.fr" --title="Inception" --admin_user="$ADMIN_USER" --admin_password="$ADMIN_PASSWORD" --admin_email="$ADMIN_EMAIL" --skip-email --path=/var/www/wordpress
  wp plugin install redis-cache --activate --path=/var/www/wordpress
  wp plugin update --all --path=/var/www/wordpress
  wp user create $WP_USER $WP_USER_EMAIL --role=author --user_pass=$WP_USER_PWD --path=/var/www/wordpress
  wp redis enable --path=/var/www/wordpress
fi

# Run by Dumb Init
php-fpm7 --nodaemonize
