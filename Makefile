test:
	composer run-script phpunit tests

setup: reset install db-prepare

install:
	composer install

db-prepare:
	php db-prepare.php

reset:
	rm db.sqlite

lint:
	phpcs -- --standard=PSR12 src tests
