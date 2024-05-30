<?php

namespace App\Models;

use CodeIgniter\Model;

class Photo extends Model
{
    protected $table      = 'photos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['parent_id','photo_type','avatar'];
}