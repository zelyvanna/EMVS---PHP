<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblparticipationFixture
 *
 */
class TblparticipationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tblparticipation';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'partId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tblEvaluation_evaId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'partContact' => ['type' => 'string', 'length' => 70, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'partDate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_tblParticipant_tblQuestionnaire1_idx' => ['type' => 'index', 'columns' => ['tblEvaluation_evaId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['partId'], 'length' => []],
            'fk_tblParticipant_tblQuestionnaire1' => ['type' => 'foreign', 'columns' => ['tblEvaluation_evaId'], 'references' => ['tblevaluation', 'evaId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'partId' => 1,
            'tblEvaluation_evaId' => 1,
            'partContact' => 'Lorem ipsum dolor sit amet',
            'partDate' => '2016-04-27'
        ],
    ];
}
