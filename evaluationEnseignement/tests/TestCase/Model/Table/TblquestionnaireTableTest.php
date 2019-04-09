<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblquestionnaireTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblquestionnaireTable Test Case
 */
class TblquestionnaireTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblquestionnaireTable
     */
    public $Tblquestionnaire;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblquestionnaire'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblquestionnaire') ? [] : ['className' => 'App\Model\Table\TblquestionnaireTable'];
        $this->Tblquestionnaire = TableRegistry::get('Tblquestionnaire', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblquestionnaire);

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
