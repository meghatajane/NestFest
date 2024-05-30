<?php

namespace App\Models;

use CodeIgniter\Model;

class City extends Model
{
    protected $table      = 'fish_city';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'state_id', 'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}