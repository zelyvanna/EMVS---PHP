<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblparticipationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblparticipationTable Test Case
 */
class TblparticipationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblparticipationTable
     */
    public $Tblparticipation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblparticipation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblparticipation') ? [] : ['className' => 'App\Model\Table\TblparticipationTable'];
        $this->Tblparticipation = TableRegistry::get('Tblparticipation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblparticipation);

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
