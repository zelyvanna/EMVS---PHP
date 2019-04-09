<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblgroupeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblgroupeTable Test Case
 */
class TblgroupeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblgroupeTable
     */
    public $Tblgroupe;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblgroupe'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblgroupe') ? [] : ['className' => 'App\Model\Table\TblgroupeTable'];
        $this->Tblgroupe = TableRegistry::get('Tblgroupe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblgroupe);

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
