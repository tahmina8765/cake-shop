<?php
App::uses('AgentExpertise', 'Model');

/**
 * AgentExpertise Test Case
 *
 */
class AgentExpertiseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agent_expertise',
		'app.agent',
		'app.chat',
		'app.expertise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AgentExpertise = ClassRegistry::init('AgentExpertise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AgentExpertise);

		parent::tearDown();
	}

}
