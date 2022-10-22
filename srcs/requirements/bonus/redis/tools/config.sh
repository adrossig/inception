conf_file="/etc/redis.conf"

# Check Whether Change on Configuration File is Needed or Not
grep -E "bind 127.0.0.1" $conf_file > /dev/null 2>&1

# If Configuration File Needs to be Changed
if [ $? -eq 0 ]; then
	# Change the Binding Host to Allow Every IP Address
	sed -i "s|bind 127.0.0.1|bind 0.0.0.0|g" $conf_file
fi

# Check Whether Change on Configuration File is Needed or Not
grep -E "protected-mode yes" $conf_file > /dev/null 2>&1

# If Configuration File Needs to be Changed
if [ $? -eq 0 ]; then
	# Change the Binding Host to Allow Every IP Address
	sed -i "s|protected-mode yes|protected-mode no|g" $conf_file
fi

sysctl vm.overcommit_memory=1

redis-server /etc/redis.conf
