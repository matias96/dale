<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carreras Model
 *
 * @property \App\Model\Table\MateriasTable|\Cake\ORM\Association\BelongsTo $Materias
 * @property \App\Model\Table\MateriasTable|\Cake\ORM\Association\HasMany $Materias
 *
 * @method \App\Model\Entity\Carrera get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carrera newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Carrera[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carrera|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carrera patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carrera[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carrera findOrCreate($search, callable $callback = null, $options = [])
 */
class CarrerasTable extends Table
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

        $this->setTable('carreras');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Materias', [
            'foreignKey' => 'materia_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Materias', [
            'foreignKey' => 'carrera_id'
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
            ->scalar('id')
            ->maxLength('id', 32)
            ->allowEmpty('id', 'create');

        $validator
            ->integer('nombre')
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->integer('sala')
            ->requirePresence('sala', 'create')
            ->notEmpty('sala');

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
        $rules->add($rules->existsIn(['materia_id'], 'Materias'));

        return $rules;
    }
}
