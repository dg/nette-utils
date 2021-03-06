<?php

/**
 * Test: Nette\Utils\Image send method exceptions.
 */

use Nette\Utils\Image;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


if (!extension_loaded('gd')) {
	Tester\Environment::skip('Requires PHP extension GD.');
}


$main = Image::fromFile('images/logo.gif');


Assert::exception(function () use ($main) { // invalid image type
	$main->send('jpg');
}, 'Nette\InvalidArgumentException', 'Unsupported image type \'jpg\'.');
