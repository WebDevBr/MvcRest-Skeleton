<?php

namespace App\Mvc\Controllers;

use WebDevBr\Mvc\Controllers\Rest;

class UsersController extends Rest
{
	protected $model = '\App\Mvc\Models\TableData\User';
}