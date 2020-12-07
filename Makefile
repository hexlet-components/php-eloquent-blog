test:
	composer run-script phpunit -- --colors=always tests

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
	composer run-script phpcs src tests
