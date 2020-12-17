# PHP School Rollcall 

_Website for attendance optimization in a generic school._

---------------------

### Project goal by martin-stepwolf :goal_net:

Project developed in a subject when I was student.
As better developer **I remade all the project** with my better skills.

### Achievements :star2:

As IT student, I knew already about databases and PHP vanilla.
Now I know **composer** and I have worked with Laravel and Symfony I improved the project with:

- Configure **composer** to respect [PSR4](https://www.php-fig.org/psr/psr-4/) standard.
- Install and configure third party packages and respect [PSR7](https://www.php-fig.org/psr/psr-7/) standard.
- Implement **Model-View-Controller pattern** and **Front Controller**.
- **Create a basic ORM(instead of use Eloquent and use the initial way to access to the database), using OOP and SQL queries**.
- Implement Twig in order to have **better views**.
- Improve the URL as /rolecall/{class_room_id} instead of /rolecall?class_room_id=*.
- Implement **library for database management** instead of load a SQL script.
- Improve the design, color palette and HTML semantic.

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites :clipboard:

The programs you need are:

-   [Composer](https://getcomposer.org/download/).
-   Database ([MySQL](https://www.mysql.com/)) and a web server with PHP 7.1.

### Installing 🔧

First duplicate the file .env.example as .env and set your credential for the database in.

```
DB_DRIVER=mysql
DB_HOST=localhost
DB_DATABASE=name
DB_USERNAME=root
DB_PASSWORD=
DB_PORT=3306
```

Then install the PHP packages.

```
composer install
```

Then generate the database and fill it with testing data:

```
vendor\bin\phinx migrate
vendor\bin\phinx seed:run
```


Finally run the server:

```
cd public
php -S localhost:8080
```

### Main functionality ⚙️

Visit the website in [Heroku](https://php-school-rollcall.herokuapp.com/) to try the website.

- In the login there are the ids and password by default to log in.
- Administrator can watch all the users.
- Students can watch its class rooms and its attendances.
- Teachers can  watch its class rooms, pass the role and edit an attendance.

## Authors

-   Martín Campos - [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/php-roll-call/issues) and/or [pull requests](https://github.com/martin-stepwolf/php-roll-call/pulls). There are many TODOs to improve the project.

## License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

## References :books:

- [PHP advance course 2018 - Course for better features](https://platzi.com/clases/php-avanzado/)
- [PHP introduction course 2018 - Course for remastering](https://platzi.com/clases/php/)
- [PHP framework introduction course](https://platzi.com/clases/php-frameworks/)
- [Oriented Object Programming in PHP - Course for creating better Models and Controllers](https://platzi.com/clases/php-poo/)
- [PHP 7 and MySQL: Course from scratch](https://www.udemy.com/course/php-y-mysql/)
