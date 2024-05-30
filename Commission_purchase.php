<?php

namespace App\Models;

use CodeIgniter\Model;

class Commission_purchase extends Model
{
    protected $table      = 'fish_commision_purchases';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['person_id', 'quantity', 'date', 'time', 'note', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}