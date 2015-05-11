# Keboola PHP Encryption [![Build Status](https://travis-ci.org/keboola/php-encryption.png?branch=master)](https://travis-ci.org/keboola/php-encryption)
[![Latest Stable Version](https://poser.pugx.org/keboola/php-encryption/v/stable.svg)](https://packagist.org/packages/keboola/php-encryption)
[![License](https://poser.pugx.org/keboola/php-encryption/license.svg)](https://packagist.org/packages/keboola/php-encryption)
[![Total Downloads](https://poser.pugx.org/keboola/php-encryption/downloads.svg)](https://packagist.org/packages/keboola/php-encryption) 


Wrapper for PHP [mcrypt](http://php.net/manual/en/book.mcrypt.php) encryption algorithms.

**WARNING!!!**
There might be a security vulnerability. Read more https://github.com/keboola/php-encryption/issues/3
Consider using another [PHP Encryption](https://github.com/keboola/php-encryption/issues/3) library. 

## Currently supported ciphers
 * AES in CBC mode with [PKCS7 padding](http://en.wikipedia.org/wiki/Padding_(cryptography\)#PKCS7)
  *  Encryption strength is determined by key length. Key lengths 16, 24, 32 corresponds with 128, 192, 256 bit encryption.

## Usage

```php
    use Keboola\Encryption\AesEncryptor;
	$encryptor = new AesEncryptor('UfhZPgPLpz7YVjXwNGTpUD8WpoddfpXn'); // 256 bit key
    $encryptedMessage = $encryptor->encrypt($inputMessage);
```

## Resources
 * https://gist.github.com/RiANOl/1077723
 * http://php.net/manual/en/function.mcrypt-encrypt.php
 * https://en.wikipedia.org/wiki/Block_cipher_mode_of_operation
 * http://www.coderelic.com/2011/10/aes-256-encryption-with-php/
 * http://en.wikipedia.org/wiki/Advanced_Encryption_Standard
 * http://blog.agilebits.com/2013/03/09/guess-why-were-moving-to-256-bit-aes-keys/
