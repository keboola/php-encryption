# Keboola PHP Encryption [![Build Status](https://travis-ci.org/keboola/php-encryption.png?branch=master)](https://travis-ci.org/keboola/php-encryption)

Wrapper for PHP [mcrypt](http://php.net/manual/en/book.mcrypt.php) encryption algorithms.

## Currently supported ciphers
 * AES128 CBC with [PKCS7 padding](http://en.wikipedia.org/wiki/Padding_(cryptography\)#PKCS7)

## Usage

```php
    use Keboola\Encryption\AES128Encryptor;
	$encryptor = new AES128Encryptor('mykey');
    $encryptedMessage = $encryptor->encrypt($inputMessage);
```

## Resources
 * https://gist.github.com/RiANOl/1077723
 * http://php.net/manual/en/function.mcrypt-encrypt.php
 * http://stackoverflow.com/questions/7448763/proper-php-mcrypt-encryption-methods
