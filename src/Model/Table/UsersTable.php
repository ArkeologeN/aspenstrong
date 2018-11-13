<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\ViewUserLogsTable|\Cake\ORM\Association\HasMany $ViewUserLogs
 * @property \App\Model\Table\VisitorsLogsTable|\Cake\ORM\Association\HasMany $VisitorsLogs
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->hasMany('ViewUserLogs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('VisitorsLogs', [
            'foreignKey' => 'user_id'
        ]);
		$this->hasOne('AsConnections', [
            'foreignKey' => 'owner'
        ]);
		$this->hasMany('AsConnectionsEmails', [
            'foreignKey' => 'entry_id'
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
            ->allowEmpty('ID', 'create');

        $validator
            ->requirePresence('user_login', 'create')
            ->notEmpty('user_login');

        $validator
            ->requirePresence('user_pass', 'create')
            ->notEmpty('user_pass');

        $validator
            ->requirePresence('user_nicename', 'create')
            ->notEmpty('user_nicename');

        $validator
            ->requirePresence('user_email', 'create')
            ->notEmpty('user_email');

        $validator
            ->requirePresence('user_url', 'create')
            ->notEmpty('user_url');

        $validator
            ->dateTime('user_registered')
            ->requirePresence('user_registered', 'create')
            ->notEmpty('user_registered');

        $validator
            ->requirePresence('user_activation_key', 'create')
            ->notEmpty('user_activation_key');

        $validator
            ->integer('user_status')
            ->requirePresence('user_status', 'create')
            ->notEmpty('user_status');

        $validator
            ->requirePresence('display_name', 'create')
            ->notEmpty('display_name');

        return $validator;
    }
}
