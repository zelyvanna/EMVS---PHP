<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblquestionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblquestionTable Test Case
 */
class TblquestionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblquestionTable
     */
    public $Tblquestion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblquestion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblquestion') ? [] : ['className' => 'App\Model\Table\TblquestionTable'];
        $this->Tblquestion = TableRegistry::get('Tblquestion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblquestion);

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
