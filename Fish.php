<?php

namespace App\Models;

use CodeIgniter\Model;

class Fish extends Model
{
    protected $table      = 'fish_fishes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'avatar', 'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}