Fork do Encurtador de URL Polr modificado para a Universidade Estadual do Rio Grande do Sul;

# Instruções de instalação:

### Instalação das dependências

- sudo apt-get install apache2
- sudo apt-get install libapache2-mod-php
- sudo systemctl restart apache2
- sudo apt-get install mysql-server
- sudo apt-get install php7.2-mysql php7.2-curl php7.2-json php7.2-mbstring
- sudo apt-get install zip unzip php7.2-zipsudo apt-get install php7.2-xml

### Instalação do encurtador

- sudo su
- cd /var/www
- git clone https://github.com/LeonardoWelter/polr.git
- chmod -R 755 polr
- chown -Rf www-data:www-data /var/www/polr

- cd /var/www/polr
- curl -sS https://getcomposer.org/installer | php
- php composer.phar install --no-dev -o

### Configuração do Apache

- cd /etc/apache2/sites-available
- sudo nano polr.conf

<VirtualHost *:80>
    ServerName MODIFICAR
    ServerAlias MODIFICAR

    DocumentRoot "/var/www/polr/public"
    <Directory "/var/www/polr/public">
        Require all granted
        Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>

- sudo nano /etc/hosts
- a2ensite polr.conf
- a2enmod rewrite

### Configuração do Banco de Dados

- sudo mysql

- create database NOME_BASE;
- CREATE USER 'USUARIO'@'localhost' IDENTIFIED BY 'SENHA';
- GRANT ALL PRIVILEGES ON NOME_BASE. * TO 'USUARIO'@'localhost';

- cd /var/www/polr
- cp .env.setup .envchown -Rf www-data:www-data /var/www/polr

