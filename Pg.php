<?php

namespace App\Models;

use CodeIgniter\Model;

class Pg extends Model
{
    protected $table      = 'pgs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name','email','phone','country','state','city','address','rent','note','capacity','facilities','is_approved','is_active','created_by','updated_by','created_at','updated_at'];
}