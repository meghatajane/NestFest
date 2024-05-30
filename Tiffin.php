<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiffin extends Model
{
    protected $table      = 'mess_tiffins';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['mess_id','student_id','date','amount','total_tiffin','created_by','updated_by','created_at','updated_at'];
}