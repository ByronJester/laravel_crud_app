<?php

namespace App\Repositories;


use App\Models\AccountsManagement\AdminAccountsModel;



class AdminRepository implements RepositoryInterface {

	public function loginUser($request){
		$un = $request->input('un');
    $pw = $request->input('pw');

		$user = AdminAccountsModel::getUser($un, $pw);

		return $user;
	}
}