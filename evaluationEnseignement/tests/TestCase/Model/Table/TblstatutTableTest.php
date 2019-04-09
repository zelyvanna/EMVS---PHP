<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblstatutTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblstatutTable Test Case
 */
class TblstatutTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblstatutTable
     */
    public $Tblstatut;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblstatut'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblstatut') ? [] : ['className' => 'App\Model\Table\TblstatutTable'];
        $this->Tblstatut = TableRegistry::get('Tblstatut', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblstatut);

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
