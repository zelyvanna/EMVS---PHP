<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblevaluationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblevaluationTable Test Case
 */
class TblevaluationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblevaluationTable
     */
    public $Tblevaluation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblevaluation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblevaluation') ? [] : ['className' => 'App\Model\Table\TblevaluationTable'];
        $this->Tblevaluation = TableRegistry::get('Tblevaluation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblevaluation);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
