<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Raffle Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $title
 * @property string $description
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Prize[] $prizes
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class Raffle extends Entity
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
        'created' => true,
        'modified' => true,
        'title' => true,
        'description' => true,
        'user_id' => true,
        'user' => true,
        'prizes' => true,
        'tickets' => true
    ];
}
