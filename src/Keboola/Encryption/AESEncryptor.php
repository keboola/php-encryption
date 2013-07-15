<?php
/**
 * AES Encryption with PKCS7 padding http://en.wikipedia.org/wiki/Padding_(cryptography)#PKCS7
 * https://gist.github.com/RiANOl/1077723
 * http://php.net/manual/en/function.mcrypt-encrypt.php
 * http://stackoverflow.com/questions/7448763/proper-php-mcrypt-encryption-methods
 *
 * User: martinhalamicek
 * Date: 7/8/13
 * Time: 3:06 PM
 */

namespace Keboola\Encryption;

class AESEncryptor implements EncryptorInterface
{

	private $_cipher = MCRYPT_RIJNDAEL_128;
	private $_mode = MCRYPT_MODE_CBC;

	private $_key;

	private $_initializationVectorSize;

	public function __construct($key)
	{
		$this->_key = $key;
		$this->_initializationVectorSize = mcrypt_get_iv_size($this->_cipher, $this->_mode);

		if (strlen($key) > ($keyMaxLength = mcrypt_get_key_size($this->_cipher, $this->_mode))) {
			throw new \InvalidArgumentException("The key length must be less or equal than $keyMaxLength.");
		}
	}

	/**
	 * @param $data
	 * @return string
	 */
	public function encrypt($data)
	{
		$blockSize = mcrypt_get_block_size($this->_cipher, $this->_mode);
		$pad = $blockSize - (strlen($data) % $blockSize);
		$iv = mcrypt_create_iv($this->_initializationVectorSize, MCRYPT_DEV_URANDOM);
		return $iv . mcrypt_encrypt(
			$this->_cipher,
			$this->_key,
			$data . str_repeat(chr($pad), $pad),
			$this->_mode,
			$iv
		);
	}

	/**
	 * @param $encryptedData
	 * @return string
	 */
	public function decrypt($encryptedData)
	{
		$initializationVector = substr($encryptedData, 0, $this->_initializationVectorSize);
		$data =  mcrypt_decrypt(
			$this->_cipher,
			$this->_key,
			substr($encryptedData, $this->_initializationVectorSize),
			$this->_mode,
			$initializationVector
		);
		$pad = ord($data[strlen($data) - 1]);
		return substr($data, 0, -$pad);
	}

}