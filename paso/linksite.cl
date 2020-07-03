server {
    listen 80;
    server_name linksite.cl;
    root /var/www/ecom/public;

    index index.html index.htm index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string=404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
	fastcgi_param   SCRIPT_FILENAME $document_root$fastcgi_script_name;
     }

    location ~ /\.ht {
        deny all;
    }

}
