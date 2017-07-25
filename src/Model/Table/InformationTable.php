<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Information Model
 *
 * @property \App\Model\Table\BilderZuInformationTable|\Cake\ORM\Association\HasMany $BilderZuInformation
 * @property \App\Model\Table\InformationZuKategorieTable|\Cake\ORM\Association\HasMany $InformationZuKategorie
 * @property \App\Model\Table\ZubereitungZuInformationTable|\Cake\ORM\Association\HasMany $ZubereitungZuInformation
 * @property \App\Model\Table\ZutatenZuInformationTable|\Cake\ORM\Association\HasMany $ZutatenZuInformation
 *
 * @method \App\Model\Entity\Information get($primaryKey, $options = [])
 * @method \App\Model\Entity\Information newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Information[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Information|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Information patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Information[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Information findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InformationTable extends Table
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

        $this->setTable('information');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('BilderZuInformation', [
            'foreignKey' => 'information_id'
        ]);
        $this->hasMany('InformationZuKategorie', [
            'foreignKey' => 'information_id'
        ]);
        $this->hasMany('ZubereitungZuInformation', [
            'foreignKey' => 'information_id'
        ]);
        $this->hasMany('ZutatenZuInformation', [
            'foreignKey' => 'information_id'
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

        $validator
            ->allowEmpty('dauer');

        $validator
            ->integer('anzahl')
            ->allowEmpty('anzahl');

        $validator
            ->allowEmpty('portionen_personen');

        $validator
            ->allowEmpty('sonstiges');

        $validator
            ->allowEmpty('kueche');

        return $validator;
    }
}
