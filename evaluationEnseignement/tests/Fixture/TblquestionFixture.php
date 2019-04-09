<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblquestionFixture
 *
 */
class TblquestionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tblquestion';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'quesId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tblGroupe_groId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblTypeQuestion_typId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quesLibelle' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_tblQuestion_tblGroupe1_idx' => ['type' => 'index', 'columns' => ['tblGroupe_groId'], 'length' => []],
            'fk_tblQuestion_tblTypeQuestion1_idx' => ['type' => 'index', 'columns' => ['tblTypeQuestion_typId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['quesId'], 'length' => []],
            'fk_tblQuestion_tblGroupe1' => ['type' => 'foreign', 'columns' => ['tblGroupe_groId'], 'references' => ['tblgroupe', 'groId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblQuestion_tblTypeQuestion1' => ['type' => 'foreign', 'columns' => ['tblTypeQuestion_typId'], 'references' => ['tbltypequestion', 'typId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'quesId' => 1,
            'tblGroupe_groId' => 1,
            'tblTypeQuestion_typId' => 1,
            'quesLibelle' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
