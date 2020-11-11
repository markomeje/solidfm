<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\{Adverts, Programmes, Members};

class TeamController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("frontend", "team/index", ["title" => "Team | Solid100.9 FM", "allActiveAdverts" => Adverts::getAllActiveAdverts(), "allMembers" => Members::getAllMembers()]);
	}

	public function member($id, $fullname) {
		if($fullname !== "") $fullname = implode(" ", explode("-", $fullname));
		View::render("frontend", "team/member", ["title" => "Team | Solid100.9 FM ". ucwords($fullname), "allActiveAdverts" => Adverts::getAllActiveAdverts(), "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(), "memberId" => $id, "allMembers" => Members::getAllMembers(), "singleMember" => Members::getMemberById($id)]);
	}

}