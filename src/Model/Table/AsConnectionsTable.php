<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AsConnections Model
 *
 * @method \App\Model\Entity\AsConnection get($primaryKey, $options = [])
 * @method \App\Model\Entity\AsConnection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AsConnection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AsConnection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AsConnection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AsConnection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AsConnection findOrCreate($search, callable $callback = null, $options = [])
 */
class AsConnectionsTable extends Table
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

        $this->setTable('as_connections');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
		
		$this->hasMany('AsConnectionsEmails', [
            'foreignKey' => 'entry_id'
        ]);
        $this->hasMany('AsConnectionsPhones', [
            'foreignKey' => 'entry_id'
        ]);
		$this->hasMany('AsConnectionsAddresses', [
            'foreignKey' => 'entry_id'
        ]);
		$this->hasMany('AsConnectionsLinks', [
            'foreignKey' => 'entry_id'
        ]);
		$this->hasMany('AsConnectionsSocials', [
            'foreignKey' => 'entry_id'
        ]);
		$this->hasMany('ConnectionCredentials', [
            'foreignKey' => 'entry_id'
        ]);
		$this->hasOne('AsConnectionsMetas', [
            'foreignKey' => 'entry_id'
        ]);
		$this->hasOne('AsConnectionsEdits', [
            'foreignKey' => 'entry_id'
        ]);
		$this->belongsTo('Users', [
            'foreignKey' => 'owner'
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
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('ts')
            ->requirePresence('ts', 'create')
            ->notEmpty('ts');

        $validator
            ->requirePresence('date_added', 'create')
            ->notEmpty('date_added');

        $validator
            ->requirePresence('entry_type', 'create')
            ->notEmpty('entry_type');

        $validator
            ->requirePresence('visibility', 'create')
            ->notEmpty('visibility');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->requirePresence('family_name', 'create')
            ->notEmpty('family_name');

        $validator
            ->requirePresence('honorific_prefix', 'create')
            ->notEmpty('honorific_prefix');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('middle_name', 'create')
            ->notEmpty('middle_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('honorific_suffix', 'create')
            ->notEmpty('honorific_suffix');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('organization', 'create')
            ->notEmpty('organization');

        $validator
            ->requirePresence('organization_visibility', 'create')
            ->notEmpty('organization_visibility');

        $validator
            ->requirePresence('department', 'create')
            ->notEmpty('department');

        $validator
            ->requirePresence('contact_first_name', 'create')
            ->notEmpty('contact_first_name');

        $validator
            ->requirePresence('contact_last_name', 'create')
            ->notEmpty('contact_last_name');

        $validator
            ->requirePresence('contact_visibility', 'create')
            ->notEmpty('contact_visibility');

        $validator
            ->requirePresence('addresses', 'create')
            ->notEmpty('addresses');

        $validator
            ->requirePresence('phone_numbers', 'create')
            ->notEmpty('phone_numbers');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('im', 'create')
            ->notEmpty('im');

        $validator
            ->requirePresence('social', 'create')
            ->notEmpty('social');

        $validator
            ->requirePresence('links', 'create')
            ->notEmpty('links');

        $validator
            ->requirePresence('dates', 'create')
            ->notEmpty('dates');

        $validator
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->requirePresence('anniversary', 'create')
            ->notEmpty('anniversary');

        $validator
            ->requirePresence('bio', 'create')
            ->notEmpty('bio');

        $validator
            ->requirePresence('notes', 'create')
            ->notEmpty('notes');

        $validator
            ->requirePresence('options', 'create')
            ->notEmpty('options');

        $validator
            ->requirePresence('locations', 'create')
            ->notEmpty('locations');

        $validator
            ->requirePresence('added_by', 'create')
            ->notEmpty('added_by');

        $validator
            ->requirePresence('edited_by', 'create')
            ->notEmpty('edited_by');

        $validator
            ->requirePresence('owner', 'create')
            ->notEmpty('owner');

        $validator
            ->requirePresence('user', 'create')
            ->notEmpty('user');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('verified_status')
            ->requirePresence('verified_status', 'create')
            ->notEmpty('verified_status');

        $validator
            ->integer('program_status')
            ->allowEmpty('program_status');

        $validator
            ->integer('health_fund_status')
            ->allowEmpty('health_fund_status');

        $validator
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        $validator
            ->allowEmpty('longi');

        $validator
            ->allowEmpty('latii');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
