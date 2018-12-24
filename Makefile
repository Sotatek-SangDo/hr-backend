migrate:
	php artisan migrate
seed:
	php artisan db:seed
build:
	npm run build
	cp .htaccess dist/.htaccess
autoload:
	composer dump-autoload
init:
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan migrate --seed
	npm install
	npm run dev
