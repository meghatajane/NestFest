<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment_type extends Model
{
    protected $table      = 'fish_payment_types';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'is_active','created_by', 'updated_by', 'created_at', 'updated_at'];
}