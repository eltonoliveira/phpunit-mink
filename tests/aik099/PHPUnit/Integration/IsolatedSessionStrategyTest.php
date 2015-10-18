<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */

namespace tests\aik099\PHPUnit\Integration;


class IsolatedSessionStrategyTest extends BrowserStackAwareTestCase
{

	/**
	 * Browser list to be used in tests.
	 *
	 * @var array
	 */
	public static $browsers = array(
		array(
			'alias' => 'browserstack',
			'sessionStrategy' => 'isolated',
		),
	);

	/**
	 * @medium
	 */
	public function testOne()
	{
		$session = $this->getSession();
		$session->visit('https://www.google.com');

		$this->assertTrue(true);
	}

	/**
	 * @medium
	 * @depends testOne
	 */
	public function testTwo()
	{
		$session = $this->getSession();
		$url = $session->isStarted() ? $session->getCurrentUrl() : null;

		$this->assertNotContains('https://www.google.com', $url);
	}

}
