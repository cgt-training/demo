<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;


/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $file
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Product extends Entity
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
     protected function _setName($name)
    { 
        $key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';
        $result = Security::encrypt($name, $key);
        //$de = Security::decrypt($result, $key);
        // print_r((new DefaultPasswordHasher)->hash($password));die();
       //echo $result;exit;
        return $name;
    }
    
    
}
