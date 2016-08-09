<?
$host = $_SERVER["HTTP_HOST"];
if (preg_match("/local$/", $host)) {
  $url = "http://admin.mozilla.local/mt/";
} else {
  $url = "https://mt.mozilla.jp/mt/";
}
$url .= "mt-tb.cgi/".htmlspecialchars($_GET["id"]);

header("Content-type: application/xml");

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
curl_setopt($ch, CURLOPT_USERAGENT, "LOCALHOST_PHP_CURL");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
curl_close($ch);
?>
