<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ForgotPassword Model
 *
 * @method \App\Model\Entity\ForgotPassword get($primaryKey, $options = [])
 * @method \App\Model\Entity\ForgotPassword newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ForgotPassword[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ForgotPassword|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ForgotPassword patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ForgotPassword[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ForgotPassword findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ForgotPasswordTable extends Table
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

        $this->setTable('forgot_password');
        $this->setDisplayField('IdForgotPassword');
        $this->setPrimaryKey('IdForgotPassword');

        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Users', [
        		'foreignKey' => 'IdUser',
        		'joinType' => 'INNER'
        ]);
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
            ->integer('IdForgotPassword')
            ->allowEmpty('IdForgotPassword', 'create');

        $validator
            ->integer('IdUser')
            ->requirePresence('IdUser', 'create')
            ->notEmpty('IdUser');

        $validator
            ->allowEmpty('token');

        return $validator;
    }
}
