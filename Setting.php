<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting extends Model
{
    protected $table      = 'fish_settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['setting_key', 'setting_val'];
}