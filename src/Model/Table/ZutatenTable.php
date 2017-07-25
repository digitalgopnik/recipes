<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zutaten Model
 *
 * @property \App\Model\Table\ZutatenZuInformationTable|\Cake\ORM\Association\HasMany $ZutatenZuInformation
 *
 * @method \App\Model\Entity\Zutaten get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zutaten newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Zutaten[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zutaten patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ZutatenTable extends Table
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

        $this->setTable('zutaten');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ZutatenZuInformation', [
            'foreignKey' => 'zutaten_id'
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
            ->allowEmpty('menge');

        $validator
            ->allowEmpty('einheit');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}
