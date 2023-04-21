<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $ParentUsers
 * @property \App\Model\Table\BuddiesTable&\Cake\ORM\Association\HasMany $Buddies
 * @property \App\Model\Table\CourseCommentsTable&\Cake\ORM\Association\HasMany $CourseComments
 * @property \App\Model\Table\CoursePhotosTable&\Cake\ORM\Association\HasMany $CoursePhotos
 * @property \App\Model\Table\CourseRatingsTable&\Cake\ORM\Association\HasMany $CourseRatings
 * @property \App\Model\Table\CourseRoundsTable&\Cake\ORM\Association\HasMany $CourseRounds
 * @property \App\Model\Table\GroupMembersTable&\Cake\ORM\Association\HasMany $GroupMembers
 * @property \App\Model\Table\GroupsTable&\Cake\ORM\Association\HasMany $Groups
 * @property \App\Model\Table\TempUserKeyTable&\Cake\ORM\Association\HasMany $TempUserKey
 * @property \App\Model\Table\UserCoursesTable&\Cake\ORM\Association\HasMany $UserCourses
 * @property \App\Model\Table\UserPointsTable&\Cake\ORM\Association\HasMany $UserPoints
 * @property \App\Model\Table\UserRolesTable&\Cake\ORM\Association\HasMany $UserRoles
 * @property \App\Model\Table\UserScoresTable&\Cake\ORM\Association\HasMany $UserScores
 * @property \App\Model\Table\UserStandingsTable&\Cake\ORM\Association\HasMany $UserStandings
 * @property \App\Model\Table\UserUpdatesTable&\Cake\ORM\Association\HasMany $UserUpdates
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $ChildUsers
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentUsers', [
            'className' => 'Users',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Buddies', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CourseComments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CoursePhotos', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CourseRatings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CourseRounds', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('GroupMembers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Groups', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('TempUserKey', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserCourses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserPoints', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserRoles', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserScores', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserStandings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserUpdates', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ChildUsers', [
            'className' => 'Users',
            'foreignKey' => 'parent_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->lengthBetween('username', [3, 15])
            ->alphaNumeric('username')
            ->requirePresence('username', 'create');

        $validator
            ->scalar('password')
            ->maxLength('password', 128)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('group')
            ->maxLength('group', 32)
            ->notEmptyString('group');

        $validator
            ->scalar('api_plan')
            ->maxLength('api_plan', 11)
            ->allowEmptyString('api_plan');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->integer('parent_id')
            ->allowEmptyString('parent_id');

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 512)
            ->allowEmptyString('fullname');

        $validator
            ->scalar('address')
            ->maxLength('address', 512)
            ->allowEmptyString('address');

        $validator
            ->scalar('city')
            ->maxLength('city', 512)
            ->allowEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 512)
            ->allowEmptyString('state');

        $validator
            ->scalar('zip_code')
            ->maxLength('zip_code', 512)
            ->allowEmptyString('zip_code');

        $validator
            ->scalar('phone1')
            ->maxLength('phone1', 512)
            ->allowEmptyString('phone1');

        $validator
            ->scalar('phone2')
            ->maxLength('phone2', 512)
            ->allowEmptyString('phone2');

        $validator
            ->integer('rank')
            ->allowEmptyString('rank');

        $validator
            ->integer('file')
            ->allowEmptyFile('file');

        $validator
            ->integer('handicap')
            ->allowEmptyString('handicap');

        $validator
            ->scalar('about')
            ->allowEmptyString('about');

        $validator
            ->scalar('hash')
            ->maxLength('hash', 64)
            ->allowEmptyString('hash');

        $validator
            ->dateTime('date_of_birth')
            ->allowEmptyDateTime('date_of_birth');

        $validator
            ->allowEmptyString('terms');

        $validator
            ->allowEmptyString('email_updates');

        $validator
            ->integer('post_count')
            ->requirePresence('post_count', 'create')
            ->notEmptyString('post_count');

        $validator
            ->scalar('medium')
            ->maxLength('medium', 64)
            ->allowEmptyString('medium');

        $validator
            ->scalar('company')
            ->maxLength('company', 512)
            ->allowEmptyString('company');

        $validator
            ->scalar('webaddress')
            ->maxLength('webaddress', 512)
            ->allowEmptyString('webaddress');

        $validator
            ->scalar('stripe_customer_id')
            ->maxLength('stripe_customer_id', 32)
            ->allowEmptyString('stripe_customer_id');

        $validator
            ->integer('active_until')
            ->allowEmptyString('active_until');

        $validator
            ->integer('api_active_until')
            ->allowEmptyString('api_active_until');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), [
            'errorField' => 'username',
            'message' => 'Dang, that username is already taken. Please try again.'
        ]);
        $rules->add($rules->isUnique(['email']), [
            'errorField' => 'email',
            'message' => 'Dang, that email is already taken. Do you already have an account?'
        ]);
        $rules->add($rules->existsIn('parent_id', 'ParentUsers'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
