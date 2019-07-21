php artisan vendor:publish --tag=config

Ejemplo básico:

```php
$authorization = new Authorization($creditCardNumber, $expirationDate, $amount, $orderId);
$transaction = \Bac::checkout($authorization, [
    ''
]);
```

El contenido de `$result` para una transacción satisfactoria sería un array como el siguiente:

```php
[
    'response' => '1',
    'responsetext' => 'SUCCESS',
    'authcode' => '123456',
    'transactionid' => '4808409171',
    'avsresponse' => '',
    'cvvresponse' => 'N',
    'orderid' => '123456789',
    'type' => 'auth',
    'response_code' => '100',
]
```

array (size=9)
  'response' => string '3' (length=1)
  'responsetext' => string 'Duplicate transaction REFID:2419279107' (length=38)
  'authcode' => string '' (length=0)
  'transactionid' => string '' (length=0)
  'avsresponse' => string '' (length=0)
  'cvvresponse' => string '' (length=0)
  'orderid' => string '123456789' (length=9)
  'type' => string 'auth' (length=4)
  'response_code' => string '300' (length=3)
  
```php
$transaction = \Bac::response($request);
```