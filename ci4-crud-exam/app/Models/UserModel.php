<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'email', 'password', 'created_at'];

    protected $useTimestamps = false; // Set to true if you want automatic timestamps
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Not used in your controller

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}