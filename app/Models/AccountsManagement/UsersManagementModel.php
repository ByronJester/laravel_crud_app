<?php

namespace App\Models\AccountsManagement;

use Illuminate\Database\Eloquent\Model;
use DB;

class UsersManagementModel extends Model {

  public static function getUsers(){
  	$users = DB::select("SELECT * FROM  applicants_tbl");

  	return $users;
  }

  public static function userProfile($id){
  	$user = DB::select("SELECT * FROM applicants_tbl WHERE applicants_id = $id");

  	return $user;
  }

  public static function updateUserProfile($id, $un, $pw, $fn, $mn, $ln, $em, $pn){
  	$has_updated = DB::update("UPDATE applicants_tbl SET username = '$un', password = '$pw', first_name = '$fn', middle_name = '$mn', last_name = '$ln', email = '$em', mobile = '$pn' WHERE applicants_id = $id");

  	return $has_updated;
  }

  public static function createUser($un, $pw, $fn, $mn, $ln, $em, $pn){
  	$has_created = DB::insert("INSERT INTO applicants_tbl (username, password, first_name, middle_name, last_name, email, mobile) VALUES('$un', '$pw', '$fn', '$mn', '$ln', '$em', '$pn')");

  	return $has_created;
  }

  public static function deleteUser($id){
  	$has_deleted = DB::delete("DELETE FROM applicants_tbl WHERE applicants_id = $id");

  	return $has_deleted; 
  }

}
 