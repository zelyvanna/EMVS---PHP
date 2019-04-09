<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbltypequestionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbltypequestionTable Test Case
 */
class TbltypequestionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TbltypequestionTable
     */
    public $Tbltypequestion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbltypequestion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tbltypequestion') ? [] : ['className' => 'App\Model\Table\TbltypequestionTable'];
        $this->Tbltypequestion = TableRegistry::get('Tbltypequestion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tbltypequestion);

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
