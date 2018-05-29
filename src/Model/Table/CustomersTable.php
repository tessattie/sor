<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\AdvisorsTable|\Cake\ORM\Association\HasMany $Advisors
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Advisors', [
            'foreignKey' => 'customer_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name')
            ->add('first_name', 'isValidFirstName', [
            'rule' => function ($data, $provider) {
                $regex = "/^[a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,30}$/";
                if (preg_match($regex, $data)) {
                    return true;
                }
                return 'The first name has unauthorized characters';
            }
        ]);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name')
            ->add('last_name', 'isValidLastName', [
            'rule' => function ($data, $provider) {
                $regex = "/^[a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,30}$/";
                if (preg_match($regex, $data)) {
                    return true;
                }
                return 'The Last name has unauthorized characters';
            }
        ]);

        $validator
            ->scalar('NIF')
            ->maxLength('NIF', 255)
            ->allowEmpty('NIF');

        $validator
            ->integer('telephone')
            ->allowEmpty('telephone');

        $validator
            ->integer('cellulaire')
            ->requirePresence('cellulaire', 'create')
            ->notEmpty('cellulaire');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmpty('address');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('entreprise')
            ->maxLength('entreprise', 255)
            ->allowEmpty('entreprise')
            ->add('entreprise', 'isValidEnterprise', [
            'rule' => function ($data, $provider) {
                $regex = "/^[a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,30}$/";
                if (preg_match($regex, $data)) {
                    return true;
                }
                return 'The business name has unauthorized characters';
            }
        ]);

        $validator
            ->scalar('employeur')
            ->maxLength('employeur', 255)
            ->allowEmpty('employeur')
            ->add('employeur', 'isValidEmployer', [
            'rule' => function ($data, $provider) {
                $regex = "/^[a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,30}$/";
                if (preg_match($regex, $data)) {
                    return true;
                }
                return 'The employer name has unauthorized characters';
            }
        ]);

        $validator
            ->integer('tel_employeur')
            ->allowEmpty('tel_employeur');

        $validator
            ->scalar('post_occupe')
            ->maxLength('post_occupe', 255)
            ->allowEmpty('post_occupe');

        $validator
            ->scalar('adresse_employeur')
            ->maxLength('adresse_employeur', 255)
            ->allowEmpty('adresse_employeur');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status')
            ->add('status', 'isValidStatus', [
            'rule' => function ($data, $provider) {
                if ($data >= 0 && $data <= 1) {
                    return true;
                }
                return 'This status is invalid';
            }
        ]);

        $validator
            ->requirePresence('type_carte', 'create')
            ->notEmpty('type_carte')
            ->add('type_carte', 'isValidSType', [
            'rule' => function ($data, $provider) {
                if ($data >= 1 && $data <= 2) {
                    return true;
                }
                return 'This card type is invalid';
            }
        ]);

        $validator
            ->scalar('num_client')
            ->maxLength('num_client', 255)
            ->requirePresence('num_client', 'create')
            ->notEmpty('num_client');

        $validator
            ->scalar('carte_identite')
            ->maxLength('carte_identite', 255)
            ->allowEmpty('carte_identite');

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
        $rules->add($rules->isUnique(['num_client']));

        return $rules;
    }
}
