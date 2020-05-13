<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable; //thêm dòng này để xác thực 
class Login extends Authenticatable
{
    //
	protected $table = "users"; //khai báo table = users.
   
}
