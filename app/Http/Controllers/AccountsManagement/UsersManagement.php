<?php

namespace App\Http\Controllers\AccountsManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\AccountsManagement\UsersManagementModel;

class UsersManagement extends Controller {

  public function index(){
    $applicants = UsersManagementModel::getUsers();

    return view('AccountsManagement/users', ['users' => $applicants]);
  }

  public function getUsers(){
    $applicants = UsersManagementModel::getUsers();

    echo json_encode($applicants);
  }

  public function create(){
    $user = UsersManagementModel::userProfile($id);
    
    echo json_encode($user);
  }


  public function store(Request $request){
    $un = $request->input('un');
    $pw = $request->input('pw');
    $fn = $request->input('fn');
    $mn = $request->input('mn');
    $ln = $request->input('ln');
    $em = $request->input('em');
    $pn = $request->input('pn');

    $msg  = "There's an error occured in creating account!";
    $code = 0;


    if($un == "" || $pw == "" || $fn == "" || $mn == "" || $ln == "" || $em == "" || $pn == ""){
      $msg = "All field must not be empty!";
    }else{
      $user = UsersManagementModel::createUser($un, $pw, $fn, $mn, $ln, $em, $pn);

      if($user === true){
        $msg  = "Successfully Created Account";
        $code = 1;
      }

    }

    $res = [
      'msg'   => $msg,
      'code'  => $code
    ];

    echo json_encode($res);
  }


  public function show($id){
    $user = UsersManagementModel::userProfile($id);
    
    echo json_encode($user);
  }


  public function edit($id){
    $user = UsersManagementModel::userProfile($id);

    echo json_encode($user);
  }


  public function update(Request $request, $id){
    $un = $request->input('un');
    $pw = $request->input('pw');
    $fn = $request->input('fn');
    $mn = $request->input('mn');
    $ln = $request->input('ln');
    $em = $request->input('em');
    $pn = $request->input('pn');

    $msg  = "There's no changes in profile";
    $code = 0;

    if($un == "" || $pw == "" || $fn == "" || $mn == "" || $ln == "" || $em == "" || $pn == ""){
      $msg = "All field must not be empty!";
    }else{
      $user = UsersManagementModel::updateUserProfile($id, $un, $pw, $fn, $mn, $ln, $em, $pn);

      if($user > 0){
        $msg  = "Successfully Updated Profile";
        $code = 1;
      }
    }

    $res = [
      'msg'   => $msg,
      'code'  => $code
    ];

    echo json_encode($res);
  
  }


  public function destroy($id){
    $user = UsersManagementModel::deleteUser($id);

    $msg  = "There's an error in deleting account!";
    $code = 0;

    if($user > 0){
      $msg  = "Successfully Deleted Account";
      $code = 1;
    }

    $res = [
      'msg'   => $msg,
      'code'  => $code
    ];

    echo json_encode($res);
  }
}
