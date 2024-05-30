<?php

namespace App\Models;

use CodeIgniter\Model;

class Mess extends Model
{
    protected $table      = 'messes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name','email','phone','country','state','city','address','rent','note','capacity','is_approved','is_active','created_by','updated_by','created_at','updated_at'];
}