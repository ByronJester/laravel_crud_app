<?php

namespace App\Models\AccountsManagement;

use Illuminate\Database\Eloquent\Model;
use DB;

class AdminAccountsModel extends Model{

	// protected $fillable = [
	// 	'name',
	// 	'email'
	// ];
   
   public static function getUser($un, $pw){
   	$users = DB::select("SELECT * FROM  admin_tbl WHERE username = '$un' AND  password = '$pw'");

  	return $users;
   }
}
