<?
error_reporting(~E_DEPRECATED & ~E_ERROR & ~E_NOTICE & ~E_WARNING);
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
session_start();
require_once "__config.php";
$db = mysqli_connect($host, $db_user, $db_pwd, $db) or die(mysqli_connect_error());

$log_audit = array(
	"a" => 1,
	"u" => 1,
	"d" => 1,
);

$short_site_name = "Company";
$site_name = "Company Name Here";
$company_name = "Company Name";
$mail_sender = "noreply@adrian.com";
$mail_recipient = "info@adrian.com";
$site_url = "http://adrianleong.ddns.net/shop3/admin";	//without www.
// $site_url = "http://localhost/shop3/admin";	//without www

$libbase = "lib/";
$mce_src_url = "assets/tinymce/js/tinymce";

$post_script = "";

$sidebar = (isset($sidebar) ? $sidebar : 1);
$navbar = (isset($navbar) ? $navbar : 1);

$currency = "RM";
$file_psx = "_info";
$can_search = (isset($can_search) ? $can_search : 1);
$can_sort = (isset($can_sort) ? $can_sort : 1);
$can_a = (isset($can_a) ? $can_a : 1);
$can_e = (isset($can_e) ? $can_e : 1);
$can_d = (isset($can_d) ? $can_d : 1);
$v = 0;

//form parameters
function hsc($s)
{
	return htmlspecialchars($s, ENT_QUOTES);
}
function frmp($s)
{
	if (isset($_POST[$s])) return hsc($_POST[$s]);
	else return "";
}
function frmg($s)
{
	if (isset($_GET[$s])) return hsc($_GET[$s]);
	else return "";
}
function frm($s)
{
	if (frmp($s) != "") return frmp($s);
	else if (frmg($s) != "") return frmg($s);
	else return "";
}
function frmr($s)
{
	if (isset($_POST[$s]) && $_POST[$s] != "") return $_POST[$s];
	else return "";
}
function clean($s)
{
	global $db;
	return mysqli_real_escape_string($db, stripslashes($s));
}
function cleanf($s)
{
	$r = preg_quote('\/:*?"<>|', '/');
	return preg_replace("/([\\x00-\\x20\\x7f-\\xff{$r}])/e", "_", $s);
}

//miscellany
function cbx($s)
{
	return ($s == "on" ? 1 : 0);
}
function rvd($s)
{
	$d = "-";
	if ($s == "") return "";
	$r = explode($d, $s);
	if (sizeof($r) != 3) return "";
	return $r[2] . $d . $r[1] . $d . $r[0];
}
function pad($s, $c, $l)
{
	while (strlen($s) < $l) {
		$s = $c . $s;
	}
	return $s;
}
function xxx($s)
{
	return preg_replace('[a-zA-Z0-9]', 'x', $s);
}
function rnd($l)
{
	$s = "abcdefghjkmnpqrstuvwxyz0123456789";
	$p = "";
	for ($i = 0; $i < $l; $i++) {
		$p .= substr($s, rand(0, strlen($s) - 1), 1);
	}
	return $p;
}
function lnbr($s)
{
	return str_replace("\n", "<br/>", $s);
}
function go($u, $t = 0)
{
	echo "<meta http-equiv='REFRESH' content='" . $t . "; URL=" . $u . "'>";
	exit;
}
function pageurl()
{
	return "http" . ($_SERVER["HTTPS"] == "on" ? "s" : "") . "://" . $_SERVER["SERVER_NAME"] . ($_SERVER["SERVER_PORT"] != "80" ? ":" . $_SERVER["SERVER_PORT"] : "") . $_SERVER["REQUEST_URI"];
}
function genap($s)
{
	$d = $s * 100;
	$m = $d % 10;
	if ($m == 1 || $m == 6) {
		$d -= 1;
	}
	if ($m == 2 || $m == 7) {
		$d -= 2;
	}
	if ($m == 3 || $m == 8) {
		$d += 2;
	}
	if ($m == 4 || $m == 9) {
		$d += 1;
	}
	return dfd($d / 100);
}
function img($s)
{
	return str_replace('../', '', $s);
}

//mysql shortcuts
function mq($s)
{
	global $db;
	return mysqli_query($db, $s);
}
function mfa($s)
{
	return mysqli_fetch_array($s);
}
function mnr($s)
{
	return mysqli_num_rows($s);
}

//session handling
function set($s, $v)
{
	global $session_pfx;
	$_SESSION[$session_pfx . $s] = $v;
}
function get($s)
{
	global $session_pfx;
	if (isset($_SESSION[$session_pfx . $s])) return $_SESSION[$session_pfx . $s];
	else return "";
}

//cookie handling
function setc($s, $v)
{
	global $session_pfx;
	setcookie($session_pfx . $s, $v, (time() + 60 * 60 * 24 * 365));
}
function getc($s)
{
	global $session_pfx;
	if (isset($_COOKIE[$session_pfx . $s])) return $_COOKIE[$session_pfx . $s];
	else return "";
}

//time formating
function now()
{
	return date('Y-m-d H:i:s');
}
function sdf($t)
{
	return date('d-M-Y', strtotime($t));
}
function sdtf($t)
{
	return date('d-M-Y, h:i a', strtotime($t));
}
function sdfnm($t)
{
	return date('d-m-Y', strtotime($t));
}
function stf($t)
{
	return date('h:i a', strtotime($t));
}
function sdfd($t)
{
	return date('d', strtotime($t));
}
function sdfm($t)
{
	return date('m', strtotime($t));
}
function sdfy($t)
{
	return date('Y', strtotime($t));
}
function monthnm($t)
{
	return date("F", mktime(0, 0, 0, sdfm($t), 10));
}

//date manipulation - only accept / return Y-m-d format. e.g. moddate('2008-01-01','+3 day')
function moddate($s, $v)
{
	return date('Y-m-d', strtotime($v, strtotime($s)));
}

//number formating
function dfi($s)
{
	return number_format($s, 0);
}
function dfd($s)
{
	return number_format($s, 2);
}

//validation
function isalphanum($s)
{
	return !preg_match('/[^a-zA-Z0-9_]/', $s);
}
function chk($s)
{
	return (strlen($s) >= 4 && strlen($s) <= 16 && isalphanum($s));
}
function isdate($s)
{
	$d = "-";
	if ($s == "") return 0;
	$r = explode($d, $s);
	if (sizeof($r) != 3) return 0;
	return checkdate($r[1], $r[2], $r[0]);
}
function isnulldate($s)
{
	return (!isset($s) || $s == "" || $s == "00-00-0000" || $s == "0000-00-00" || $s == "00-00-0000 00:00:00" || $s == "0000-00-00 00:00:00");
}
function isemail($s)
{
	$a = "a-z0-9-";
	$r = "/^[_" . $a . "]+(\.[_" . $a . "]+)*@[" . $a . "]+(\.[" . $a . "]+)*(\.[a-z]{2,10})$/i";
	return (preg_match($r, $s));
}
function isphone($s)
{
	return !(preg_match('/[^0-9()\-]/', $s));
}
//function isurl($s) {return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i',$s);}
function isurl($s)
{
	return preg_match('|^[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $s);
}
function isint($s)
{
	return !preg_match('/[^0-9,]/', $s);
}
function isdbl($s)
{
	return (!preg_match('/[^0-9.,]/', $s) && substr_count($s, ".") < 2);
}
function cint($s)
{
	return (isint($s) ? trim(str_replace(",", "", $s)) + 0 : 0);
}
function cdbl($s)
{
	return (isdbl($s) ? trim(str_replace(",", "", $s)) + 0 : 0.00);
}
function cbool($s)
{
	$s = strtolower($s);
	return (($s == 'y' || $s == 'yes' || $s == 'true' || $s == '1' || $s == 'on') ? 1 : 0);
}
function epfx($e, $s)
{
	return (($e != "" ? "<br/>" : "") . "&#149;&nbsp; " . $s);
}
function upfx($u, $s)
{
	return (($u != "" ? "<br/>" : "") . "&#149;&nbsp; " . $s);
}

function getimg($s)
{
	return str_replace("../", "", $s);
}

function pr($s)
{
	echo "<pre>";
	print_r($s);
	echo "</pre>";
}


$this_file = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/") + 1);
$this_name = substr($this_file, 0, strlen($this_file) - 4);
$next_file = (strpos($this_name, $file_psx) !== false ? substr($this_name, 0, strlen($this_name) - strlen($file_psx)) : $this_name . $file_psx) . ".php";

if (!isset($omit_file)) {
	$omit_file = array("login.php", "__ajax.php");
}
if (!in_array($this_file, $omit_file) && get("usr") == "") {
	go("logout.php");
}
