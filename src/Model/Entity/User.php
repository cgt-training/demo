<?php 
// src/Model/Entity/User.php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'username' => true,
        'password' => true,    
    ];

    // ...

    protected function _setPassword($password)
    { 
        // print_r((new DefaultPasswordHasher)->hash($password));die();
        return (new DefaultPasswordHasher)->hash($password);
    }
    

    // ...
}

?>