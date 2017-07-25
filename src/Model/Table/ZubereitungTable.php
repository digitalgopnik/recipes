<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zubereitung Model
 *
 * @property \App\Model\Table\ZubereitungZuInformationTable|\Cake\ORM\Association\HasMany $ZubereitungZuInformation
 *
 * @method \App\Model\Entity\Zubereitung get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zubereitung newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Zubereitung[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zubereitung|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zubereitung patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zubereitung[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zubereitung findOrCreate($search, callable $callback = null, $options = [])
 */
class ZubereitungTable extends Table
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

        $this->setTable('zubereitung');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ZubereitungZuInformation', [
            'foreignKey' => 'zubereitung_id'
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
            ->allowEmpty('beschreibung');

        return $validator;
    }
}
