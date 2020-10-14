<?php

namespace Application\Core;
use Application\Core\{Application, View};
use Gregwar\Captcha\CaptchaBuilder;
use Application\Library\{Session, Cookie};


class Controller extends Application {

    public $activeController;
    public $backendLinks = ["dashboard", "programmes", "archive", "adverts", "schedules", "categories", "youtube"];
    public $frontendLinks = ["home", "services", "contact", "blog"];


    public function __construct() {
        parent::__construct();
        $this->activeController = View::active(self::get("url"));
    }

    public function isAjaxRequest(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
            return strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        }
    }

    public function getCaptcha(){
        $captcha = new CaptchaBuilder;
        $captcha->build();
        Session::set('captcha', $captcha->getPhrase());
        return $captcha;
    }

    public function isPostRequest() {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    public function jsonEncode($response){
      	header("Access-Control-Allow-Origin: *");
      	header("Content-Type: applicaton/json; charset=UTF-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: -1");
      	http_response_code(200);
      	echo json_encode($response);
    }

    public function jsonDecode($response){
      	header("Access-Control-Allow-Origin: *");
      	header("Content-Type: applicaton/json; charset=UTF-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: -1");
      	http_response_code(200);
      	json_decode($response);
    }

    public function isGetRequest() {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    }

}
