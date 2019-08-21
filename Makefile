test:
	composer run-script phpunit tests

setup:
	composer install

reset:
	rm db.sqlite

lint:
	phpcs -- --standard=PSR12 src tests
