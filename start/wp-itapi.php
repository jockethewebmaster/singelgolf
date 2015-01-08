<?php
/******************************************************************************\
|*                                                                            *|
|* All text, code and logic contained herein is copyright by Installatron LLC *|
|* and is a part of 'the Installatron program' as defined in the Installatron *|
|* license: http://installatron.com/plugin/eula                               *|
|*                                                                            *|
|* THE COPYING OR REPRODUCTION OF ANY TEXT, PROGRAM CODE OR LOGIC CONTAINED   *|
|* HEREIN IS EXPRESSLY PROHIBITED. VIOLATORS WILL BE PROSECUTED TO THE FULL   *|
|* EXTENT OF THE LAW.                                                         *|
|*                                                                            *|
|* If this license is not clear to you, DO NOT CONTINUE;                      *|
|* instead, contact Installatron LLC at: support@installatron.com             *|
|*                                                                            *|
\******************************************************************************/
@chdir('/home/u269503889/public_html/start');@set_time_limit(0);$GLOBALS["_fileowner"] = fileowner(__FILE__);if (isset($_SERVER["I_POST"])){parse_str($_SERVER["I_POST"],$_GET);$_POST = $_REQUEST = array_merge($_GET,$_POST);}else if (empty($_REQUEST)){$_REQUEST = array_merge($_GET,$_POST);}set_error_handler("__i_client_error_handler");$GLOBALS["__i_client_error_stack"] = array();function __i_client_error_handler($errno, $errstr, $errfile, $errline){if (!(error_reporting() & $errno)){return;}switch ($errno) {case E_ERROR:case E_USER_ERROR:$GLOBALS["__i_client_error_stack"][] = "Error: ".$errstr." in ".$errfile."[$errline] (PHP ".PHP_VERSION." ".PHP_OS.")";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;break;case E_WARNING:case E_USER_WARNING:$doSkipLog = strpos($errstr,"Permission denied") !== false && strpos($errstr,"unlink(") !== false|| strpos($errstr,"chmod(): Operation not permitted") !== false|| strpos($errstr,"wp-content/plugins") !== false;if (!$doSkipLog){$GLOBALS["__i_client_error_stack"][] = $errstr." in ".$errfile."[$errline] (PHP ".PHP_VERSION." ".PHP_OS.")";}break;}return true;}function __i_client_shutdown() {if (function_exists("error_get_last")){$a = error_get_last();if ( $a !== null && $a["type"] === 1 ){$GLOBALS["__i_client_error_stack"][] = "Fatal Error: ".$a["message"]." in ".$a["file"]."[".$a["line"]."]";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}}} register_shutdown_function("__i_client_shutdown");?><?php if ( !isset($_POST["build"]) || !isset($_POST["hash"]) || !isset($_POST["cmd"])|| 4 !== intval($_POST["build"])|| '3qmfohzeiu04wwc0csw00osg' !== $_POST["hash"] ){echo '__CLIENT__RESPONCE__START__'.serialize(array("I_ACCESS_DENIED",$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;}if ( $_POST["cmd"] === "list" ){define("ABSPATH", dirname(__FILE__)."/");include_once(ABSPATH."wp-config.php");include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");include_once(ABSPATH."wp-admin/includes/class-wp-upgrader.php");include_once(ABSPATH."wp-includes/update.php");include(ABSPATH."wp-includes/version.php");$current = get_transient("update_plugins");if (!is_object($current)){$current = new stdClass;}$current->last_checked = 0;set_transient("update_plugins", $current);@wp_update_plugins();$o = array(get_plugins(), array(), $wp_version);$ood = get_site_transient("update_plugins");foreach ( $o[0] as $i => $r ){$o[0][$i]["_enabled"] = is_plugin_active($i);if (isset($ood->response[$i])){$o[0][$i]["_ud"] = array("id" => $ood->response[$i]->id,"slug" => $ood->response[$i]->slug,"new_version" => $ood->response[$i]->new_version,"url" => $ood->response[$i]->url,"package" => $ood->response[$i]->package);}}$current = get_transient("update_themes");if (!is_object($current)){$current = new stdClass;}$current->last_checked = 0;set_transient("update_themes", $current);@wp_update_themes();$ood = get_site_transient("update_themes");foreach ( wp_get_themes() as $i => $r ){$o[1][$i] = array("Name"       => $r->get("Name"),"Title"      => $r->get("Name"),"Version"    => $r->get("Version"),"Author"     => $r->get("Author"),"Author URI" => $r->get("AuthorURI"),"Template"   => $r->get_template(),"Stylesheet" => $r->get_stylesheet());if (isset($ood->response[$i])){$o[1][$i]["_ud"] = $ood->response[$i];}}echo '__CLIENT__RESPONCE__START__'.serialize(array($o,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "install" ){define("ABSPATH", dirname(__FILE__)."/");include_once(ABSPATH."wp-config.php");include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");activate_plugin($_POST["id"]);echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "disable" ){define("ABSPATH", dirname(__FILE__)."/");include_once(ABSPATH."wp-config.php");include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");$list = is_array($_POST["id"]) ? $_POST["id"] : array($_POST["id"]);deactivate_plugins($list);echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}?>