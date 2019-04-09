<?php
namespace App\Model\Table;

use App\Model\Entity\Tblstatut;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblstatut Model
 *
 */
class TblstatutTable extends Table
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

        $this->table('tblstatut');
        $this->displayField('statId');
        $this->primaryKey('statId');
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
            ->integer('statId')
            ->allowEmpty('statId', 'create');

        $validator
            ->requirePresence('statNom', 'create')
            ->notEmpty('statNom');

        return $validator;
    }
}
