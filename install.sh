# Script to automate the installation process

# Install PHP dependencies
docker-compose exec app composer install
# Create the tables in the database
docker-compose exec app vendor/bin/phinx migrate
# Fill the tables with fake data
docker-compose exec app vendor/bin/phinx seed:run
