<?php
namespace App\Model\Table;

use App\Model\Entity\Tblquestionnaire;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblquestionnaire Model
 *
 */
class TblquestionnaireTable extends Table
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

        $this->table('tblquestionnaire');
        $this->displayField('qstId');
        $this->primaryKey('qstId');
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
            ->integer('qstId')
            ->allowEmpty('qstId', 'create');

        $validator
            ->requirePresence('qstNom', 'create')
            ->notEmpty('qstNom');

        return $validator;
    }
}
