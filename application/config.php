<?php

define("DEVELOPMENT", isset($_SERVER["HTTP_HOST"]) && strtolower($_SERVER["HTTP_HOST"]) === "solidfm.radio" ? true : false);

define("DOMAIN", DEVELOPMENT ? "http://solidfm.radio" : $_ENV["LIVE_WEBSITE_DOMAIN"]);

ini_set("session.referer_check", "TRUE");
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

define("COOKIE_PATH", "/");
define("COOKIE_DOMAIN", "");
define("COOKIE_SECURE", false);
define("COOKIE_HTTP", false);
define("COOKIE_EXPIRY", 3600 * 24 * 15); /** 15 days **/

define("SESSION_COOKIE_NAME", "hjkrueihi548ysgnk3kdnbm6aoprgahit7483uj");
define("SESSION_COOKIE_EXPIRY", 3600 * 24 * 60); /** 60 Days **/
define("PAGINATION_DEFAULT_LIMIT", 30);
