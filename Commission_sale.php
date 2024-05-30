<?php

namespace App\Models;

use CodeIgniter\Model;

class Commission_sale extends Model
{
    protected $table      = 'fish_commision_sales';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['person_id', 'date', 'time', 'fish_id', 'quantity', 'amount', 'commission_purchase_id', 'note','created_by', 'updated_by', 'created_at', 'updated_at'];
}