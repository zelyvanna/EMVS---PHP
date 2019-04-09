<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbllistequestionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbllistequestionTable Test Case
 */
class TbllistequestionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TbllistequestionTable
     */
    public $Tbllistequestion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbllistequestion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tbllistequestion') ? [] : ['className' => 'App\Model\Table\TbllistequestionTable'];
        $this->Tbllistequestion = TableRegistry::get('Tbllistequestion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tbllistequestion);

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
