# Phonebook-app 

A simple phonebook app that creates entry of first name, last name, email and phone number using PHP Framework - Laravel. This my first repository. :D

## Installation

Download and install XAMPP: https://www.apachefriends.org/download.html

After Installing, start server for apache and mysql.


Create folder named phonebook-app on xampp\htdocs(mostly in c drive)
and 
extract content from phonebook-app-master to phonebook-app folder.


Download and Install Composer: https://getcomposer.org/download/

Create a database locally named phonebook-app

Rename .env.example file to .env and define the following in it:

```python
APP_NAME=Phonebook
```

and

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=phonebook-app
DB_USERNAME=root
DB_PASSWORD=
```


Open console(command prompt) and go to directory of phonebook-app (xampp\htdocs\phonebook-app)

Run ```composer install``` or ```php composer.phar install```

Run ```php artisan key:generate```

Run ```php artisan migrate```

As server in XAMPP is running, open browser and type: 

http://localhost/phonebook-app/public/
