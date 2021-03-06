# KavenegarSms

Send SMS with kavenegar RESTFUL Api
## Installation

Via Composer

``` bash
$ composer require shetabit/kavenegarsms
```

Publish config file
``` bash
php artisan vendor:publish
```

## Usage
Send custom message:
```php
 $mobile = '0911*******';
 $message = 'test message';
 
 $sms = new KavenegarSms;
 $result = $sms->send($mobile, $message);
 if($result['success']) {
    //Send successfully
 } else {
    //Send failed!
    dd($result['message']);
 }
```
Send lookup message:
```php
 $mobile = '0911*******';
 $token1 = rand(1111, 9999);
 $token2 = '';
 $token3 = '';
 $template = 'verify';
 
 $sms = new KavenegarSms;
 $result = $sms->lookup($mobile, $token1, $token2, $token3, $template);
 if($result['success']) {
    //Send successfully
 } else {
    //Send failed!
    dd($result['message']);
 }
```
## Testing

``` bash
$ composer test
```

## Credits

- [Hashem Moghaddari][link-author]

## License

Shetabit. Please see the [license file](license.md) for more information.
