<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materia Entity
 *
 * @property string $id
 * @property string $carrera_id
 * @property int $nombre
 * @property int $apellido
 *
 * @property \App\Model\Entity\Carrera[] $carreras
 */
class Materia extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'carrera_id' => true,
        'nombre' => true,
        'apellido' => true,
        'carreras' => true
    ];
}
