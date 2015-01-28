https://wiki.archlinux.org/index.php/sqlite
http://www.sqlite.org/quickstart.html

http://www.phoca.cz/documents/16-joomla/336-how-to-enable-displaying-php-errors-on-site
error_reporting  =  E_ALL
display_errors = On



#crap tier
http://dthpham.me/post/21425839861/installing-owncloud-with-nginx-and-sqlite



#https://wiki.archlinux.org/index.php/nginx
pacman -S nginx php php-fpm php-sqlite

#/etc/php/php.ini /etc/php/php-fpm.conf /etc/nginx/nginx.conf

systemctl enable php-fpm.service
systemctl restart nginx; systemctl restart nginx php-fpm

#if nginx fails, use this to diagnose problem
systemctl -l status nginx.service


useradd kk
chown kk db_dir 
