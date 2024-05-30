<?php

namespace App\Models;

use CodeIgniter\Model;

class State extends Model
{
    protected $table      = 'fish_state';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'country_id', 'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}