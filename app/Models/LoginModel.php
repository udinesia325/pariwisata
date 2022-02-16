<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'login_user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields = ["fullname",'username','password'];
}
