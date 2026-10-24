test:
	composer exec phpunit

setup: reset install db-prepare

console:
	composer exec psysh

install:
	composer install

db-prepare:
	php db-prepare.php

reset:
	rm db.sqlite || true

lint:
	mago lint
	mago fmt --check

update-deps:
	composer bump
	composer update
	composer outdated