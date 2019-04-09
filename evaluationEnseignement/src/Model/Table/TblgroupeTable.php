<?php
namespace App\Model\Table;

use App\Model\Entity\Tblgroupe;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblgroupe Model
 *
 */
class TblgroupeTable extends Table
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

        $this->table('tblgroupe');
        $this->displayField('groId');
        $this->primaryKey('groId');
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
            ->integer('groId')
            ->allowEmpty('groId', 'create');

        $validator
            ->requirePresence('groNom', 'create')
            ->notEmpty('groNom');

        return $validator;
    }
}
