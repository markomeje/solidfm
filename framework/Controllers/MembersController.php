<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\{Members};

class MembersController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("backend", "members/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "allMembers" => Members::getAllMembers(), "memberStatus" => Members::$memberStatus]);
	}

	public function addMember() {
		if ($this->isAjaxRequest()) {
			$response = Members::addMember();
			$this->jsonEncode($response);
		}
	}

	public function editMember($id) {
		if ($this->isAjaxRequest()) {
			$response = Members::editMember($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteMember($id) {
		if ($this->isAjaxRequest()) {
			$response = Members::deleteMember($id);
			$this->jsonEncode($response);
		}
	}

	public function changeMemberPhoto($id) {
		if ($this->isAjaxRequest()) {
			$response = Members::changeMemberPhoto($id);
			$this->jsonEncode($response);
		}
	}

}