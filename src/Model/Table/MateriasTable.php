<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materias Model
 *
 * @property \App\Model\Table\CarrerasTable|\Cake\ORM\Association\BelongsTo $Carreras
 * @property \App\Model\Table\CarrerasTable|\Cake\ORM\Association\HasMany $Carreras
 *
 * @method \App\Model\Entity\Materia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Materia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Materia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Materia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Materia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Materia findOrCreate($search, callable $callback = null, $options = [])
 */
class MateriasTable extends Table
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

        $this->setTable('materias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Carreras', [
            'foreignKey' => 'carrera_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Carreras', [
            'foreignKey' => 'materia_id'
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
            ->integer('apellido')
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

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
        $rules->add($rules->existsIn(['carrera_id'], 'Carreras'));

        return $rules;
    }
}
