<?php

include_once __DIR__ . '/../config/config.inc.php';
include 'style/wrapper.inc.php';

$page = 'oauth';
$pageTitle = "OAuth";

includeHeader();

if (!isset($_COOKIE['sid'])) {
	try {
		$assertion = $_GET['assertion'];
		$token = $_GET['token'];
		$username = explode(',', $assertion)[1];
		header('Set-Cookie: sid='.$username.',,'.$token.'; Domain=fakemons.localhost; Max-Age=604800; Path=/; Secure; SameSite=None');
		header('Set-Cookie: assertion='.urlencode($assertion).'; Domain=fakemons.localhost; Max-Age=604800; Path=/; Secure; SameSite=None', false);
		?>
			<div class="main">
				<h1>You have been successfully authenticated.</h1>

				<p>You may close this page now.</p>
			</div>
		<?php
	} catch (Exception $e) {
		?>
			<div class="main">
				<h1>An error occured.</h1>

				<p>Try contacting Anas about this.</p>
			</div>
		<?php
	}
} else {
	?>
			<div class="main">
				<h1>You are already authenticated.</h1>

				<p>You may close this page now.</p>
			</div>
	<?php
}


includeFooter();

?>
