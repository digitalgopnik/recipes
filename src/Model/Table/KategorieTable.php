<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kategorie Model
 *
 * @property \App\Model\Table\InformationZuKategorieTable|\Cake\ORM\Association\HasMany $InformationZuKategorie
 *
 * @method \App\Model\Entity\Kategorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kategorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kategorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kategorie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kategorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kategorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kategorie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class KategorieTable extends Table
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

        $this->setTable('kategorie');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('InformationZuKategorie', [
            'foreignKey' => 'kategorie_id'
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
            ->allowEmpty('name');

        return $validator;
    }
}
