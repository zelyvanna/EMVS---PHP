<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblsectionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblsectionTable Test Case
 */
class TblsectionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblsectionTable
     */
    public $Tblsection;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblsection'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblsection') ? [] : ['className' => 'App\Model\Table\TblsectionTable'];
        $this->Tblsection = TableRegistry::get('Tblsection', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblsection);

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
