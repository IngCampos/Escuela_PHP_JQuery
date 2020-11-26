# PHP School Roll Call

_Website for attendance optimization (call the roll) in a school._

### Project goal by martin-stepwolf :goal_net:

Project developed in a subject when I was student.
As better developer **I rebuilt all the project** whit my better skills.
Note: The project does the same (modules, views, database).

### Achievements :star2:

As IT student, I knew already about databases and PHP vanilla.
Now I know **composer** and I have worked whit Laravel and Symfony I improved the project whit:

- Configure **composer** and the **Front controller**.
- Install and configure third party packages.
- Implement **Model-View-Controller pattern**.
- **Create a basic ORM(instead of use Eloquent and use the initial way to access to the database), using OOP and SQL queries**.
- Implement Twig in order to have **better views**.
- Set the routes whit its url, controller and method.
- Clean and optimize the code.

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites :clipboard:

The programs you need are:

-   [Composer](https://getcomposer.org/download/).
-   Database and a web server whit PHP.

### Installing 🔧

First install the PHP packages.

```
composer install
```

Then import the file database.sql.

Finally run the server:

```
cd public
php -S localhost:8080
```

### Main functionality ⚙️

- In the login there are the ids and password by default to log in.
- Administrator can watch all the users.
- Students can watch its classes and its attendances.
- Teachers can  watch its classes, pass the role and edit an attendance of a student.

## Authors

-   Martín Campos - _Initial work_ [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/php-roll-call/issues) and/or [pull requests](https://github.com/martin-stepwolf/php-roll-call/pulls). There are many TODOs to improve the project.

## License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

## References :books:

- [PHP introduction course 2018 - Course for remastering](https://platzi.com/clases/php/)
- [PHP 7 and MySQL: Course from scratch](https://www.udemy.com/course/php-y-mysql/)
