<?php
namespace App\Model\Table;

use App\Model\Entity\Tblreponse;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblreponse Model
 *
 */
class TblreponseTable extends Table
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

        $this->table('tblreponse');
        $this->displayField('repId');
        $this->primaryKey('repId');
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
            ->integer('repId')
            ->allowEmpty('repId', 'create');

        $validator
            ->allowEmpty('repLibelle');

        $validator
            ->integer('repPonderation')
            ->requirePresence('repPonderation', 'create')
            ->notEmpty('repPonderation');

        return $validator;
    }
}
