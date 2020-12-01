TradeApp API Client
====

A skeleton repo of a PHP Guzzle API Client for Laravel to consume trading platform data.

TradeApp is an independent API client using Guzzle 7, intended for consuming data from various Global Trading Platforms.


## Installation
Install using [Composer](http://getcomposer.org), doubtless.

```sh
$ composer require nysschens/tradeapp-api-client
```

## Usage

First, you'll need to create a client object to connect to the trading platform servers with. 
You will need an API username and password from whatever trade platform you subscribe to. Ask your broker for that info. Then pass those credentials into the client object for logging in, like this.

```php
$client = new \TradeApp\ApiClient("https://<username>:<password>@<hostname>");
```

Assuming your credentials are valid, you are good to go!

### Get countries list

```php
/** @var \TradeApp\Responses\Country[] $countries */
$countries = $client->countries();
```

### Register a new customer

```php
$request = new TradeApp\Requests\Register([
    'firstName' => 'John',
    'lastName' => 'Smith',
    'email' => 'john.smith@gmail.com',
    'confirmed' => 1,
    'password' => 'qwerty',
    'phone' => '+123456789',
    'country' => 'gb',
    'locale' => 'en-GB',
    'params' => [],
    'lead' => 0,
]);

/** @var \TradeApp\Responses\Register $response */
$response = $client->register($request);
```

### Login as user

```php
$request = new \TradeApp\Requests\Login([
    'email' => 'nysschens@gmail.com',
    'password' => 'qwerty',
]);

/** @var \TradeApp\Responses\Login $response */
$response = $client->login($request);
```

### Get user info

```php
$request = new \TradeApp\Requests\Login([
    'email' => 'john.smith@gmail.com',
    'password' => 'qwerty',
]);

/** @var \TradeApp\Responses\UserInfo $response */
$response = $client->getUserInfo($request);
```

### Running tests

Run unit tests via [PHPUnit](http://phpunit.de):

```sh
$ vendor/bin/phpunit tests
```

Note: Install dev dependencies for this package with 

```sh
$ composer update --dev
```
