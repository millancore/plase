# PlaSE
PlaSE - Payment Library to connect to PSE

## Installing PlaSE via Composer

``` bash
composer require millancore/plase
```

## How to use

``` php
use Plase\PlasePayment;

$plase = PlasePayment::fromConfig([
    'login' => 'LOGIN',
    'tranKey' => 'TRANKEY',
    'wsdl' => 'WSDL_ENPOINT',
    'location' => 'ENDPOINT'
]);
```
### Create Payer, Buyer and Shipping

```php
use Plase\Entity\Person;

$payer = new Person([
        'document' => 548794703,
        'documentType' => 'SSN',
        'firstName' => 'Sonny',
        'lastName' => 'Stokes',
        'company' => 'Prosacco, Feeney and Nitzsche',
        'emailAddress' => 'trystan60@service.com',
        'address' => '42895 Kirlin Prairie Apt. 538 North Lulamouth',
        'city' => 'East Jeremyville',
        'province' => 'Texas',
        'country' => 'SA',
        'phone' => '(292) 888-5127 x93540',
        'mobile' => '212-474-4638 x541',
]);
```
### Create a new resquest with ResquestBuilder in one step

```php
use Plase\RequestBuilder;

$builder = new RequestBuilder([
        'bankCode' => 256,
        'bankInterface' => 0,
        'returnURL' => 'https://returnpayment.com/payment',
        'reference' => 1232312,
        'description' => 'Ut enim dicta fugit. Enim ut minima fugiat',
        'language' => 'PL',
        'currency' => 'TJS',
        'totalAmount' => 10,
        'taxAmount' => 2202855.15,
        'devolutionBase' => 1854213.41,
        'tipAmount' => 82.95,
        'payer' => Person Object,
        'buyer' => Person Object,
        'shipping' => Person Object,
        'ipAddress' => '37.49.34.76',
        'userAgent' => 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5311 (KHTML, like Gecko) Chrome/37.0.862.0 Mobile Safari/5311',
        'additionalData' => ['name' => 'code', 'value' => 312321]
]);

$transaction = $plase->addTransaction(
        $builder->getRequest()
    )->send();
```

### ResquestBuilder step by step

```php
$builder = new RequestBuilder();

$request = RequestBuilder::create()
                ->bankCode(41231)
                ->bankInterface(1)
                ->returnURL('https://gateway.com/payment')
                ->payer(Person Object)
                ...
                ->getResquest();

$transaction = $plase->addTransaction($request)->send();
```

## PlaSE Integrated in laravel
[https://github.com/millancore/laraplase](https://github.com/millancore/laraplase) 

## Running Tests

``` bash
composer test
```