<?php

namespace App\Repositories;

interface RepositoryInterface {

	/**
	 * Description
	 *
	 * @param array $request
	 * @return mixed
	 */
	public function loginUser($request);
	
}