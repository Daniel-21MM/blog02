<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'estatus', 'created_at'];

    public function login($email, $password)
    {

        $user = $this->where('email', $email)->first();

        if ($user) {

            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }
}
