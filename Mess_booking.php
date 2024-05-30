<?php

namespace App\Models;

use CodeIgniter\Model;

class Mess_booking extends Model
{
    protected $table      = 'mess_bookings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['mess_id','mess_amount','status','payment_status','documents','screenshot','created_by','updated_by','created_at','updated_at'];
}