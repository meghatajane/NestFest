<?php

namespace App\Models;

use CodeIgniter\Model;

class Feedback extends Model
{
    protected $table      = 'feedbacks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['pg_mess_id','feedback_type','rate','comment','created_by','updated_by','created_at','updated_at'];
}