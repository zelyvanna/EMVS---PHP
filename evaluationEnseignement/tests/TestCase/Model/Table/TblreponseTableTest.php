<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblreponseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblreponseTable Test Case
 */
class TblreponseTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblreponseTable
     */
    public $Tblreponse;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblreponse'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblreponse') ? [] : ['className' => 'App\Model\Table\TblreponseTable'];
        $this->Tblreponse = TableRegistry::get('Tblreponse', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblreponse);

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
