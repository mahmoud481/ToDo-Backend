# PHP
```sudo apt install software-properties-common```
```sudo add-apt-repository ppa:ondrej/php```

Installing PHP as an Apache module is a straightforward task:
```sudo apt update```
```sudo apt install php8.0 libapache2-mod-php8.0```
# Composer
First, update the package manager cache by running:
```sudo apt update```

Next, run the following command to install the required packages:
```sudo apt install php-cli unzip```

Make sure you’re in your home directory, then retrieve the installer using curl:
```cd ~```
```curl -sS https://getcomposer.org/installer -o composer-setup.php```


To install composer globally, use the following command which will download and install Composer as a system-wide command named composer, under /usr/local/bin:
```sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer```


To test your installation, run:
```composer```


# Install mysql

```sudo apt-get update```

```sudo apt-get install mysql```

To create new user in mysql run:
```sudo mysql -u root -p```

Now add this line to create new user:
```CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';```

now you can use this user in the laravel application.


# Laravel
``` git clone https://github.com/mahmoud481/ToDo-Backend.git```

```cd ToDo-Backend```

```composer install```

rename .env.example to .env

#### Configure database 
Open your .env file and change the database name (DB_DATABASE)

Run``` php artisan key:generate```
Run ```php artisan migrate```

Run ```php artisan serve```
