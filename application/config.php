<?php

define("ENVIROMENT", "development");
define("DOMAIN", isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) === "on" ? $_ENV["LIVE_WEBSITE_DOMAIN"] : "http://solidfm.radio");
define("BACKEND_URL", isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) === "on" ? $_ENV["LIVE_WEBSITE_SUBDOMAIN"] : "http://backend.solidfm.radio");
define("REQUEST_URI", isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "");
ini_set("session.referer_check", "TRUE");
define("HTTP_REFERER", isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "");
define("PUBLIC_URL", DOMAIN."/public");
define("SOFWARE_NAME", "Solid100.9 FM");

define("LOCAL_DATABASE_HOST", "127.0.0.1");
define("LOCAL_DATABASE_NAME", "solidfm");
define("LOCAL_DATABASE_USERNAME", "root");
define("LOCAL_DATABASE_PASSWORD", "");
define("LOCAL_DATABASE_CHARSET", "UTF8");

foreach (["LIVE_DATABASE_HOST", "LIVE_DATABASE_NAME", "LIVE_DATABASE_USERNAME", "LIVE_DATABASE_PASSWORD", "LIVE_DATABASE_CHARSET"] as $CREDENTIAL) {
	define($CREDENTIAL, $_ENV[$CREDENTIAL]);
}

define("REMEMBER_ME_COOKIE_EXPIRY", 3600 * 24 * 365); /** One Year **/
define("REMEMBER_ME_COOKIE_NAME", "h89hIteIHB7nb5yh3ufer7fad2q9yv98");
define("COOKIE_PATH", "/");
define("COOKIE_DOMAIN", "");
define("COOKIE_SECURE", false);
define("COOKIE_HTTP", false);
define("COOKIE_EXPIRY", 3600 * 24 * 15); /** 15 days **/

define("SESSION_COOKIE_NAME", "hjkrueihi548ysgnk3kdnbm6aoprgahit7483uj");
define("SESSION_COOKIE_EXPIRY", 3600 * 24 * 60); /** 60 Days **/
define("ENCRYPTION_KEY", "H43ag5js60z4D86tgEsh6w4e385Y");
define("REMEMBER_ME_SESSION_NAME", "4638295qgkh81y8qhrkngan8y4985ghnkjg");

define("ACCESS_DENIED_KEY", "672kbauh892ytqBGKA89jnbproeqnjhrwk017Ty89");
define("PAGINATION_DEFAULT_LIMIT", 30);
