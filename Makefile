test:
	composer run-script phpunit tests

setup: reset install db-prepare

console:
	./vendor/bin/psysh

install:
	composer install

db-prepare:
	php db-prepare.php

reset:
	rm db.sqlite || true

lint:
	phpcs -- --standard=PSR12 src tests
