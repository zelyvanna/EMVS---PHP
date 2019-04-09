<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblparametreTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblparametreTable Test Case
 */
class TblparametreTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblparametreTable
     */
    public $Tblparametre;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblparametre'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblparametre') ? [] : ['className' => 'App\Model\Table\TblparametreTable'];
        $this->Tblparametre = TableRegistry::get('Tblparametre', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblparametre);

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
