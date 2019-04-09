<?php
namespace App\Model\Table;

use App\Model\Entity\Tblparticipation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblparticipation Model
 *
 */
class TblparticipationTable extends Table
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

        $this->table('tblparticipation');
        $this->displayField('partId');
        $this->primaryKey('partId');
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
            ->integer('partId')
            ->allowEmpty('partId', 'create');

        $validator
            ->integer('tblEvaluation_evaId')
            ->requirePresence('tblEvaluation_evaId', 'create')
            ->notEmpty('tblEvaluation_evaId');

        $validator
            ->allowEmpty('partContact');

        $validator
            ->date('partDate')
            ->requirePresence('partDate', 'create')
            ->notEmpty('partDate');

        return $validator;
    }
}
