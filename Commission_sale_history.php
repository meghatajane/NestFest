<?php

namespace App\Models;

use CodeIgniter\Model;

class Commission_sale_history extends Model
{
    protected $table      = 'fish_commision_sales_history';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['sale_id', 'payment_type_id', 'amount', 'date', 'time','note', 'is_first_payment','created_by', 'updated_by', 'created_at', 'updated_at'];
}