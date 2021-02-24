# PHP School Rollcall ![Status](https://img.shields.io/badge/status-in_rafactoring-yellowgreen) ![Passing](https://img.shields.io/badge/build-passing-green) ![Docker build](https://img.shields.io/badge/docker_build-passing-green)

_Website for attendance optimization in a generic school._

### Project goal by martin-stepwolf :goal_net:

This was a [project developed](https://github.com/martin-stepwolf/php-school-rollcall/releases/tag/v1.0.0) in a subject when I was student.
Now **I refactored all the project** with better practices, similar to professional framework.

### Achievements :star2:

- Configured **composer** to respect [PSR4](https://www.php-fig.org/psr/psr-4/) standard.
- Installed third party packages and respect [PSR7](https://www.php-fig.org/psr/psr-7/) standard.
- Implemented **Model-View-Controller pattern** and **Front Controller**.
- Implemented a basic ORM using OOP and SQL queries.
- Implemented Twig in order to have better views.
- Improved the URLs (/rolecall/{class_room_id} instead of /rolecall?class_room_id=*).
- Implemented library for database management (migrations and seeders).
- Improved the design, palette colors and HTML semantic.
- Implemented docker compose for a better environment.

---

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites :clipboard:

The programs you need are:

-   [Docker](https://www.docker.com/get-started).
-   [Docker compose](https://docs.docker.com/compose/install/).

### Installing 🔧

First duplicate the file .env.example as .env.

```
cp .env.example .env
```

Note: You could change some values, anyway docker-compose create the database according to the defined values.

Create the image (php:7.4-composer-npm) and run the services (php, nginx and mysql):

```
docker-compose up
```

Note: The next steps can be automated by running

```
sh ./install.sh
```

Then install the PHP packages.

```
docker-compose exec app composer install
```

Finally generate the database and fill it with testing data:

```
docker-compose exec app vendor/bin/phinx migrate
docker-compose exec app vendor/bin/phinx seed:run
```

And now you have all the environment, the nginx server is in the port 8000 (e.g http://127.0.0.1:8000/).

---

## Functionality ⚙️

Visit the website in [Heroku](https://php-school-rollcall.herokuapp.com/) to try the website.

- In the login there are the ids and password by default to log in.
- Administrator can watch all the users.
- Students can watch its class rooms and its attendances.
- Teachers can  watch its class rooms, pass the role and edit an attendance.

---

### Authors

- Martín Campos - [martin-stepwolf](https://github.com/martin-stepwolf)

### Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/php-roll-call/issues) and/or [pull requests](https://github.com/martin-stepwolf/php-roll-call/pulls).

### License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

### References :books:

- [Tutorial Laravel with Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04)
- [Docker course](https://platzi.com/clases/docker/)
- [PHP advance course 2018 - Course for better features](https://platzi.com/clases/php-avanzado/)
- [PHP introduction course 2018 - Course for remastering](https://platzi.com/clases/php/)
- [PHP framework introduction course](https://platzi.com/clases/php-frameworks/)
- [Oriented Object Programming in PHP - Course for creating better Models and Controllers](https://platzi.com/clases/php-poo/)
- [PHP 7 and MySQL: Course from scratch](https://www.udemy.com/course/php-y-mysql/)
