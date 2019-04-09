<?php
namespace App\Model\Table;

use App\Model\Entity\Tbllistequestion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbllistequestion Model
 *
 */
class TbllistequestionTable extends Table
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

        $this->table('tbllistequestion');
        $this->displayField('lstQuestion');
        $this->primaryKey('lstQuestion');
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
            ->integer('lstQuestion')
            ->allowEmpty('lstQuestion', 'create');

        $validator
            ->integer('tblQuestion_quesId')
            ->requirePresence('tblQuestion_quesId', 'create')
            ->notEmpty('tblQuestion_quesId');

        $validator
            ->integer('tblQuestionnaire_qstId')
            ->requirePresence('tblQuestionnaire_qstId', 'create')
            ->notEmpty('tblQuestionnaire_qstId');

        return $validator;
    }
}
