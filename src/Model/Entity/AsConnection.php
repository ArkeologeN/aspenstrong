<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AsConnection Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $ts
 * @property string $date_added
 * @property string $entry_type
 * @property string $visibility
 * @property string $slug
 * @property string $family_name
 * @property string $honorific_prefix
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $honorific_suffix
 * @property string $title
 * @property string $organization
 * @property string $organization_visibility
 * @property string $department
 * @property string $contact_first_name
 * @property string $contact_last_name
 * @property string $contact_visibility
 * @property string $addresses
 * @property string $phone_numbers
 * @property string $email
 * @property string $im
 * @property string $social
 * @property string $links
 * @property string $dates
 * @property string $birthday
 * @property string $anniversary
 * @property string $bio
 * @property string $notes
 * @property string $options
 * @property string $locations
 * @property int $added_by
 * @property int $edited_by
 * @property int $owner
 * @property int $user
 * @property string $status
 * @property int $verified_status
 * @property int $program_status
 * @property int $health_fund_status
 * @property string $logo
 * @property string $longi
 * @property string $latii
 */
class AsConnection extends Entity
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
        '*' => true,
        'id' => false
    ];
}
