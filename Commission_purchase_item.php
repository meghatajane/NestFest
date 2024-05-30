<?php

namespace App\Models;

use CodeIgniter\Model;

class Commission_purchase_item extends Model
{
    protected $table      = 'fish_commision_purchase_items';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['commision_purchase_id', 'fish_id', 'quantity', 'amount', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}