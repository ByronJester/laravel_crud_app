<?php

namespace App\Http\Controllers\AccountsManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;


class AdminAccounts extends Controller{
  protected $todo;

  public function __construct(AdminRepository $todo){
      $this->todo = $todo;
  }

  public function index(){
    return view('AccountsManagement/admin');
  }

  public function create(){
      
  }

  public function store(Request $request){
    $res['code'] = 0;
    $res['msg']  = "Incorrect Username or Password";

    if(count($this->todo->loginUser($request)) > 0){
      $res['code'] = 1;
      $res['msg']  = "Successfully Login";
    }

    echo json_encode($res);

  }


  public function show($id){
      //
  }

  public function edit($id){
      //
  }


  public function update(Request $request, $id){
      //
  }


  public function destroy($id){
      //
  }
}
