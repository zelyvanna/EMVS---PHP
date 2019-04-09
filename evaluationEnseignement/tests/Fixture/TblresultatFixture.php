<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblresultatFixture
 *
 */
class TblresultatFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tblresultat';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'resId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tblReponse_repId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblQuestion_quesId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblParticipation_partId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'resCommentaire' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_tblResultat_tblParticipant_idx' => ['type' => 'index', 'columns' => ['tblParticipation_partId'], 'length' => []],
            'fk_tblResultat_tblQuestion1_idx' => ['type' => 'index', 'columns' => ['tblQuestion_quesId'], 'length' => []],
            'fk_tblResultat_tblReponse1_idx' => ['type' => 'index', 'columns' => ['tblReponse_repId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['resId'], 'length' => []],
            'fk_tblResultat_tblParticipant' => ['type' => 'foreign', 'columns' => ['tblParticipation_partId'], 'references' => ['tblparticipation', 'partId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblResultat_tblQuestion1' => ['type' => 'foreign', 'columns' => ['tblQuestion_quesId'], 'references' => ['tblquestion', 'quesId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblResultat_tblReponse1' => ['type' => 'foreign', 'columns' => ['tblReponse_repId'], 'references' => ['tblreponse', 'repId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'resId' => 1,
            'tblReponse_repId' => 1,
            'tblQuestion_quesId' => 1,
            'tblParticipation_partId' => 1,
            'resCommentaire' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
