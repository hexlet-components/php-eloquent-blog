test:
	composer run-script phpunit tests

setup:
	composer install

reset:
	rm db.sqlite
