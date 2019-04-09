<?php
namespace App\Model\Table;

use App\Model\Entity\Tblquestion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblquestion Model
 *
 */
class TblquestionTable extends Table
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

        $this->table('tblquestion');
        $this->displayField('quesId');
        $this->primaryKey('quesId');
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
            ->integer('quesId')
            ->allowEmpty('quesId', 'create');

        $validator
            ->integer('tblGroupe_groId')
            ->requirePresence('tblGroupe_groId', 'create')
            ->notEmpty('tblGroupe_groId');

        $validator
            ->integer('tblTypeQuestion_typId')
            ->requirePresence('tblTypeQuestion_typId', 'create')
            ->notEmpty('tblTypeQuestion_typId');

        $validator
            ->requirePresence('quesLibelle', 'create')
            ->notEmpty('quesLibelle');

        return $validator;
    }
}
