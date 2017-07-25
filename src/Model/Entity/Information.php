<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Information Entity
 *
 * @property int $id
 * @property string $name
 * @property string $dauer
 * @property int $anzahl
 * @property string $portionen_personen
 * @property string $sonstiges
 * @property string $kueche
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BilderZuInformation[] $bilder_zu_information
 * @property \App\Model\Entity\InformationZuKategorie[] $information_zu_kategorie
 * @property \App\Model\Entity\ZubereitungZuInformation[] $zubereitung_zu_information
 * @property \App\Model\Entity\ZutatenZuInformation[] $zutaten_zu_information
 */
class Information extends Entity
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
        '*' => true
    ];
}
