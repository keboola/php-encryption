<?php
/**
 * User: martinhalamicek
 * Date: 7/12/13
 * Time: 3:32 PM
 */

namespace Keboola\Encryption\Tests;

use Keboola\Encryption\AES128Encryptor;

class AESEncryptorTest extends \PHPUnit_Framework_TestCase
{

	public function testEncryptedMessageShouldNotBeEqualToSourceMessage()
	{
		$encryptor = new AES128Encryptor('mykey');
		$inputMessage = 'someMessage';
		$this->assertNotEquals($inputMessage, $encryptor->encrypt($inputMessage));
	}

	/**
	 * @dataProvider inputMessages
	 * @param $inputMessage
	 */
	public function testEncryptionShouldNotChangeMessage($inputMessage)
	{
		$encryptor = new AES128Encryptor('mykey');
		$this->assertEquals($inputMessage, $encryptor->decrypt($encryptor->encrypt($inputMessage)));
	}

	public function inputMessages()
	{
		return array_map(function($item) { return array($item); }, array(
			'some message',
			' message with spaces ',
			"with line

			break \0\0"
		));
	}

	public function testEncryptedMessageIsDifferentForSameInputs()
	{
		$inputMessage = 'someMessage';

		$encryptor = new AES128Encryptor('mykey');
		$this->assertNotEquals($encryptor->encrypt($inputMessage), $encryptor->encrypt($inputMessage));
	}

}