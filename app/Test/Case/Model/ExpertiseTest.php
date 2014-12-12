<?php
App::uses('Expertise', 'Model');

/**
 * Expertise Test Case
 *
 */
class ExpertiseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.expertise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Expertise = ClassRegistry::init('Expertise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Expertise);

		parent::tearDown();
	}

}
