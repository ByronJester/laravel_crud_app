<?php

namespace App\Http\Controllers\AccountsManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;


class AdminAccounts extends Controller{
  protected $todo;

  public function __construct(AdminRepository $todo){
      $this->adminRepository = $todo;
  }

  public function index(Request $request){
    if($request->session()->get('id') == ""){
      return view('AccountsManagement/admin');
    }else{
      return view('AccountsManagement/users');
    }
    
  }

  public function login(Request $request){
    return $this->adminRepository->loginUser($request);
  }

  public function logout(Request $request){
    $request->session()->forget('id');

    if($request->session()->get('id') == ""){
      return view('AccountsManagement/admin');
    }
    
  } 
}
