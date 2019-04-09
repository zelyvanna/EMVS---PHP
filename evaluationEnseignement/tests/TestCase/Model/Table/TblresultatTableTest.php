<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblresultatTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblresultatTable Test Case
 */
class TblresultatTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblresultatTable
     */
    public $Tblresultat;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblresultat'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblresultat') ? [] : ['className' => 'App\Model\Table\TblresultatTable'];
        $this->Tblresultat = TableRegistry::get('Tblresultat', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblresultat);

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
