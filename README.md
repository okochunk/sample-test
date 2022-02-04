# 12.12 event
- perhaps there are no server side validation to check stock when user add to cart and checkout process also need deduct stock as long order active and need to rollback when order canceled.
- negative inventory quantity may cause during time user add to cart -> checkout owner change product quantity.


## Expected order - cart flow PoC
- https://www.dropbox.com/s/h0x3ydjorsho6jj/evrms-cart.drawio.svg?dl=0


# Installation

Installation step

```sh
$ Composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```

# Testing
```sh
1. cp .env to .env.testing && adjust db config for test in .env.testing
2. run: php artisan config:cache --env=testing
3. run: php artisan migrate --env=testing
4. run test with: ./vendor/bin/phpunit
```

# API documentation:
list of the api end points:


>GET /api/products/

>GET /api/products/:id

>POST /api/carts/

>GET /api/carts/:CartToken

>POST /api/carts/:CartToken

>POST /api/carts/:CartToken/checkout

>DEL /api/carts/:CartToken

>GET /api/orders

>GET /api/orders/:orderID



