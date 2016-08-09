<?
$host = $_SERVER["HTTP_HOST"];
if (preg_match("/local$/", $host)) {
  $url = "http://admin.mozilla.local/mt/";
} else {
  $url = "https://mt.mozilla.jp/mt/";
}
$url .= "mt-comments.cgi";

// クオートにバックスラッシュが付くのを防ぐ
if (get_magic_quotes_gpc()) {
  foreach ($_POST as $key => $val) {
    if (is_string($val))
      $_POST[$key] = stripcslashes($val);
  }
}

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

$post_action = isset($_POST["post"]);
$entry_url = htmlspecialchars($_POST["entry_url"]);
if ($post_action && $entry_url) {
  @header("HTTP/1.0 302 Found");
  @header("Location: $entry_url");
}
?>
