<?php
namespace App\Model\Table;

use App\Model\Entity\Tblsection;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblsection Model
 *
 */
class TblsectionTable extends Table
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

        $this->table('tblsection');
        $this->displayField('secId');
        $this->primaryKey('secId');
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
            ->integer('secId')
            ->allowEmpty('secId', 'create');

        $validator
            ->requirePresence('secNom', 'create')
            ->notEmpty('secNom');

        $validator
            ->requirePresence('secAbrev', 'create')
            ->notEmpty('secAbrev');

        return $validator;
    }
}
