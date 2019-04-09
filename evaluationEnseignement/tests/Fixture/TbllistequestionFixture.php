<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TbllistequestionFixture
 *
 */
class TbllistequestionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tbllistequestion';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'lstQuestion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tblQuestion_quesId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblQuestionnaire_qstId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tblListeQuestion_tblQuestion1_idx' => ['type' => 'index', 'columns' => ['tblQuestion_quesId'], 'length' => []],
            'fk_tblListeQuestion_tblQuestionnaire1_idx' => ['type' => 'index', 'columns' => ['tblQuestionnaire_qstId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['lstQuestion'], 'length' => []],
            'tblQuestion_quesId_tblQuestionnaire_qstId' => ['type' => 'unique', 'columns' => ['tblQuestion_quesId', 'tblQuestionnaire_qstId'], 'length' => []],
            'fk_tblListeQuestion_tblQuestion1' => ['type' => 'foreign', 'columns' => ['tblQuestion_quesId'], 'references' => ['tblquestion', 'quesId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblListeQuestion_tblQuestionnaire1' => ['type' => 'foreign', 'columns' => ['tblQuestionnaire_qstId'], 'references' => ['tblquestionnaire', 'qstId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'lstQuestion' => 1,
            'tblQuestion_quesId' => 1,
            'tblQuestionnaire_qstId' => 1
        ],
    ];
}
