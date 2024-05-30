<?php

namespace App\Models;

use CodeIgniter\Model;

class Country extends Model
{
    protected $table      = 'fish_country';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}