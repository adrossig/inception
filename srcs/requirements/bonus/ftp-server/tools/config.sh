# !/bin/sh

if [ ! -f "/etc/vsftpd/vsftpd.conf" ]; then
  sleep 5;
  cp /tmp/vsftpd.conf /etc/vsftpd/vsftpd.conf
  adduser $FTP_USER --disabled-password --gecos "" --home /home/$FTP_USER --shell /bin/sh
  echo "$FTP_USER:$FTP_PWD" | chpasswd > /dev/null
  echo "local_root=$FTP_ROOT" >> /etc/vsftpd/vsftpd.conf
fi

chgrp -R $FTP_USER $FTP_ROOT
chown -R $FTP_USER $FTP_ROOT
chmod -R +x $FTP_ROOT

vsftpd /etc/vsftpd/vsftpd.conf
