<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblprofesseurTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblprofesseurTable Test Case
 */
class TblprofesseurTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblprofesseurTable
     */
    public $Tblprofesseur;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblprofesseur'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblprofesseur') ? [] : ['className' => 'App\Model\Table\TblprofesseurTable'];
        $this->Tblprofesseur = TableRegistry::get('Tblprofesseur', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblprofesseur);

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
