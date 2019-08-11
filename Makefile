test:
	composer run-script phpunit tests

setup:
	touch db.sqlite
	composer install
