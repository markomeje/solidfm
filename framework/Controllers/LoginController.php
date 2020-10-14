<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Router};
use Application\Library\{Session};
use Framework\Models\Login;

class LoginController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("backend", "login/index", ["title" => "Login"]);
	}

	public function login() {
		if ($this->isAjaxRequest()) {
			$response = Login::login();
			$this->jsonEncode($response);
		}
	}

	public function logout() {
		Session::destroy();
		Router::redirect("/login");
	}

}