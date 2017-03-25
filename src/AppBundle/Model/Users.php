<?php

namespace AppBundle\Model;

use Core\Model;

class Users extends Model
{
    public function getUser($login, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE login = :login AND password = MD5(:password)');
        $user->execute(array(
            ':login'    => $login,
            ':password' => $password
        ));

        return $user->fetch();
    }
}