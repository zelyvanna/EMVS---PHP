<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblevaluationFixture
 *
 */
class TblevaluationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tblevaluation';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'evaId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tblQuestionnaire_qstId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblSection_secId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblProfesseur_proId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tblStatut_statId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'evaNom' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'evaDebutValidite' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'evaFinValidite' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'evaCodeAccesParticipant' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'evaCodeAccesSynthese' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'evaClasse' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'evaModule' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_tblEvaluation_tblSection1_idx' => ['type' => 'index', 'columns' => ['tblSection_secId'], 'length' => []],
            'fk_tblEvaluation_tblStatut1_idx' => ['type' => 'index', 'columns' => ['tblStatut_statId'], 'length' => []],
            'fk_tblEvaluation_tblQuestionnaire1_idx' => ['type' => 'index', 'columns' => ['tblQuestionnaire_qstId'], 'length' => []],
            'fk_tblEvaluation_tblProfesseur1_idx' => ['type' => 'index', 'columns' => ['tblProfesseur_proId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['evaId'], 'length' => []],
            'fk_tblEvaluation_tblProfesseur1' => ['type' => 'foreign', 'columns' => ['tblProfesseur_proId'], 'references' => ['tblprofesseur', 'proId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblEvaluation_tblQuestionnaire1' => ['type' => 'foreign', 'columns' => ['tblQuestionnaire_qstId'], 'references' => ['tblquestionnaire', 'qstId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblEvaluation_tblSection1' => ['type' => 'foreign', 'columns' => ['tblSection_secId'], 'references' => ['tblsection', 'secId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tblEvaluation_tblStatut1' => ['type' => 'foreign', 'columns' => ['tblStatut_statId'], 'references' => ['tblstatut', 'statId'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'evaId' => 1,
            'tblQuestionnaire_qstId' => 1,
            'tblSection_secId' => 1,
            'tblProfesseur_proId' => 1,
            'tblStatut_statId' => 1,
            'evaNom' => 'Lorem ipsum dolor sit amet',
            'evaDebutValidite' => '2016-04-27',
            'evaFinValidite' => '2016-04-27',
            'evaCodeAccesParticipant' => 'Lorem ipsum dolor sit amet',
            'evaCodeAccesSynthese' => 'Lorem ipsum dolor sit amet',
            'evaClasse' => 'Lorem ipsu',
            'evaModule' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
