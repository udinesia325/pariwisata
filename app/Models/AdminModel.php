<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'login_admin';
    protected $primaryKey       = 'id_admin';
    protected $allowedFields    = ['fullname','username','password'];
   
}
