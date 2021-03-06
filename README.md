# laravel-payant

[![Latest Stable Version](https://poser.pugx.org/olaoluwa-98/laravel-payant/v/stable.svg)](https://packagist.org/packages/olaoluwa-98/laravel-payant)
[![License](https://poser.pugx.org/olaoluwa-98/laravel-payant/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/olaoluwa-98/laravel-payant.svg)](https://travis-ci.org/olaoluwa-98/laravel-payant)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/olaoluwa-98/laravel-payant/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/olaoluwa-98/laravel-payant/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/olaoluwa-98/laravel-payant.svg?style=flat-square)](https://packagist.org/packages/olaoluwa-98/laravel-payant)

Inspired By unicodeveloper's [laravel-paystack](https://github.com/unicodeveloper/laravel-paystack)

Main functions from Jonathan Itakpe's [payantNG-php](https://github.com/JonathanItakpe/payantNG-php)

> A Laravel 5 Package for working with Payant

## Installation

[PHP](https://php.net) 5.4+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel Payant, simply add the following line to the require block of your `composer.json` file.

```php
"buhafran/payant-laravel": "1.1.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel Payant is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `Olaoluwa98\Payant\PayantServiceProvider::class`

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'Payant' => Olaoluwa98\Payant\Facades\Payant::class,
    ...
]
```

## Configuration

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --provider="Olaoluwa98\Payant\PayantServiceProvider"
```

A configuration-file named `payant.php` with some sensible defaults will be placed in your `config` directory:

```php
<?php

return [

    /**
     * Public Key From Payant Dashboard
     *
     */
    'public_key' => env('PAYANT_PUBLIC_KEY'),

    /**
     * Private Key From Payant Dashboard
     *
     */
    'private_key' => env('PAYANT_PRIVATE_KEY'),

    /**
     * Payant API MODE
     */
    'mode' => env('PAYANT_MODE'),
];
```

## Usage

Open your .env file and add your public key, private key, demo status like so:
You can get them from your [Payant Dashboard](https://payant.ng/settings/developer)

```php
PAYANT_PUBLIC_KEY=xxxxxxxxxxxxx
PAYANT_PRIVATE_KEY=xxxxxxxxxxxxx
PAYANT_MODE= DEMO or LIVE
```

Functions are named based on the documentation located [API Documentation](https://developers.payant.ng/overview)
Read the functions in the documentation to know parameters needed for each function

You can use the package in your controller by adding `use Payant;`
```php
$client_data = ['first_name' => 'Emmanuel',
                'last_name' => 'Awotunde',
                'email' => 'awotunde.emmanuel1@gmail.com',
                'phone' => '+2348090579032'];
Payant::addClient($client_data);
```
the function above would return the following JSON data if request is successful
```
{
  "status": "success",
  "message": "Client created successfully.",
  "data": {
    "company_id": <company_id>,
    "name": "<name>",
    "first_name": "<first_name>",
    "last_name": "<last_name>",
    "email": "<email>",
    "phone": "<phone_no>",
    "website": "<website>",
    "address": "<address>",
    "type": "Customer",
    "settlement_bank": "",
    "account_name": "",
    "account_number": "",
    "status": "1",
    "created_at": "date",
    "updated_at": "date",
    "id": <id_of_client>
  }
}
```

## Functions in this package
* Miscellaneous
  1. `getBanks()` [GET]
  2. `resolveAccount( array $client_data )` [POST]
* Client
  1. `addClient( array $client_data )` [POST]
  2. `getClient( $client_id )` [GET]
  3. `editClient( $client_id, array $client_data )` [PUT]
  4. `deleteClient( $client_id )` [DELETE]
* Invoices
  1. `addInvoice( $client_id, array $client_data, $due_date, $fee_bearer, array $items )` [POST]
  2. `getInvoice( string $reference_code )` [GET]
  3. `sendInvoice( string $reference_code )` [GET]
  4. `getInvoiceHistory( $period, $start = null, $end = null )` [POST]
  5. `deleteInvoice( string $reference_code )` [DELETE]
* Transfer
  1. `addTransfer( array $client_data, string $amount )` [POST]
  2. `getTransfer( string $reference_code )` [GET]
  3. `getTransferHistory( $period, $start = null, $end = null )` [POST]
  4. `deleteTransfer( string $reference_code )` [DELETE]
* Payments
  1. `addPayment( string $reference_code, string $due_date, string $amount, string $channel )` [POST]
  2. `getPayment( string $reference_code )` [GET] 
  3. `getPaymentHistory( string $period, string $start, string $end )` [POST]
  4. `deleteTransfer( string $reference_code )` [DELETE]
* Wallets
  1. `addWallet( string $name, string $passcode )` [POST]
  2. `getWallet( string $reference_code )` [GET] 
  3. `changeWalletPasscode( string $reference_code, string $old_passcode, string $passcode )` [PUT]
  4. `getWallets()` [GET]
  5. `setWalletStatus( string $reference_code )` [GET]
  6. `withdrawFromWallet( string $reference_code, array $client_data, string $amount, string $passcode )` [POST]
  7. `getWalletTransactions( string $reference_code, $period, $start = null, $end = null )` [POST]
* Products
  1. `addProduct( string $name, string $description, string $unit_cost, string $type )` [POST]
  2. `getProduct( $product_id )` [GET] 
  3. `editProduct( $product_id, array $product_data )` [PUT]
  4. `getProducts()` [GET]
  5. `deleteProduct( $product_id )` [DELETE]


## Todo

* Add Comprehensive Tests

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/olaoluwa_98)!

Thanks!
Emmanuel Awotunde.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
