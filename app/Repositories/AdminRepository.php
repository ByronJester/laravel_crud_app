<?php

namespace App\Repositories;


use App\Models\AccountsManagement\AdminAccountsModel;



class AdminRepository implements RepositoryInterface {

	public function loginUser($request){
		$res['code'] = 0;
    $res['msg']  = "Incorrect Username or Password";

		$un = $request->input('un');
    $pw = $request->input('pw');
		$user = AdminAccountsModel::getUser($un, $pw);

		if(count($user) > 0){
			$res['code'] = 1;
      $res['msg']  = "Successfully Login";

      $request->session()->put('id', $user[0]->admin_id);
		}

		return $res;
	}
}