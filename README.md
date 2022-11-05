# PHP School Rollcall ![Status](https://img.shields.io/badge/status-no_longer_maintained-orange) ![Passing](https://img.shields.io/badge/build-passing-green) ![Docker build](https://img.shields.io/badge/docker_build-passing-green)

_Website for attendance optimization in a generic school._

### Project goal by mascam97

This was a [project developed](https://github.com/mascam97/php-school-rollcall/tree/3c5f1bb4af2f09d55142fba9c01f919fd1b72030) with vanilla PHP in a subject when I was student.
Now **I refactored all the project** with better practices (MVC, Composer, etc), similar to professional framework.

Due to this project does not have testing, is not deployed anymore and does not have more purposes, is no longer maintained.

### Achievements :star2:

- Configured **composer** to respect [PSR4](https://www.php-fig.org/psr/psr-4/) standard.
- Installed third party packages and respect [PSR7](https://www.php-fig.org/psr/psr-7/) standard.
- Implemented **Model-View-Controller pattern** and **Front Controller**.
- Implemented a basic ORM using OOP and SQL queries.
- Implemented Twig in order to have better views.
- Improved the URLs (/rolecall/{class_room_id} instead of /rolecall?class_room_id=*).
- Implemented libraries for database management (migrations and seeders).
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

Note: You can run the last command in the background with `docker-compose up -d`.

Now you have all the environment ready, for the next commands you need to be inside of the app container with:

```
docker-compose exec app /bin/bash
```

Then install the PHP packages.

```
composer install
```

Finally generate the database and fill it with testing data:

```
vendor/bin/phinx migrate
vendor/bin/phinx seed:run
```

And now you have all the environment in the port 8000.

Note: Use `exit` command to exit from the container, `docker-compose down` to delete the containers and `docker volume rm php-school-rollcall_mysql` to delete the database volume.

---

## Functionality ⚙️

- In the login there are the ids and password by default to log in.
- Administrator can watch all the users.
- Students can watch its class rooms and its attendances.
- Teachers can  watch its class rooms, pass the role and edit an attendance.

---

### Authors

- Martín S. Campos - [mascam97](https://github.com/mascam97)

### Contributing

You're free to contribute to this project by submitting [issues](https://github.com/mascam97/php-roll-call/issues) and/or [pull requests](https://github.com/mascam97/php-roll-call/pulls).

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
