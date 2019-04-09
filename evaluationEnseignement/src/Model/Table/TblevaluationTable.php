<?php
namespace App\Model\Table;

use App\Model\Entity\Tblevaluation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblevaluation Model
 *
 */
class TblevaluationTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tblevaluation');
        $this->displayField('evaId');
        $this->primaryKey('evaId');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('evaId')
            ->allowEmpty('evaId', 'create');

        $validator
            ->integer('tblQuestionnaire_qstId')
            ->requirePresence('tblQuestionnaire_qstId', 'create')
            ->notEmpty('tblQuestionnaire_qstId');

        $validator
            ->integer('tblSection_secId')
            ->requirePresence('tblSection_secId', 'create')
            ->notEmpty('tblSection_secId');

        $validator
            ->integer('tblProfesseur_proId')
            ->requirePresence('tblProfesseur_proId', 'create')
            ->notEmpty('tblProfesseur_proId');

        $validator
            ->integer('tblStatut_statId')
            ->requirePresence('tblStatut_statId', 'create')
            ->notEmpty('tblStatut_statId');

        $validator
            ->requirePresence('evaNom', 'create')
            ->notEmpty('evaNom');

        $validator
            ->date('evaDebutValidite')
            ->requirePresence('evaDebutValidite', 'create')
            ->notEmpty('evaDebutValidite');

        $validator
            ->date('evaFinValidite')
            ->requirePresence('evaFinValidite', 'create')
            ->notEmpty('evaFinValidite');

        $validator
            ->requirePresence('evaCodeAccesParticipant', 'create')
            ->notEmpty('evaCodeAccesParticipant');

        $validator
            ->requirePresence('evaCodeAccesSynthese', 'create')
            ->notEmpty('evaCodeAccesSynthese');

        $validator
            ->requirePresence('evaClasse', 'create')
            ->notEmpty('evaClasse');

        $validator
            ->requirePresence('evaModule', 'create')
            ->notEmpty('evaModule');

        return $validator;
    }
}
