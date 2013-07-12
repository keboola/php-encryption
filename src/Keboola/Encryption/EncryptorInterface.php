<?php
/**
 * Created by JetBrains PhpStorm.
 * User: martinhalamicek
 * Date: 7/8/13
 * Time: 3:06 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Keboola\Encryption;

interface EncryptorInterface
{
	public function encrypt($data);

	public function decrypt($data);

}