<!DOCTYPE html>
<html>
<head>
	<title>Changelog | Stand</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		if(location.search=="?Launchpad")
		{
			location.href="changelog-launchpad";
		}
	</script>
	<link href="/halfmoon-variables.min.css" crossorigin="anonymous" rel="stylesheet" />
	<link href="/halfmoon-config.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js" crossorigin="anonymous" defer></script>
</head>
<body class="dark-mode">
	<div class="page-wrapper with-navbar">
		<nav class="navbar">
			<div class="container-xl">
				<a class="navbar-brand" href="/">Stand</a>
				<ul class="navbar-nav d-none d-sm-flex">
					<li class="nav-item"><a class="nav-link" href="/">GTA V</a></li>
					<li class="nav-item"><a class="nav-link" href="/vpn/">VPN</a></li>
					<li class="nav-item active"><a class="nav-link" href="/help/">Help</a></li>
				</ul>
				<div class="navbar-content ml-auto d-none d-sm-flex">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="/account/">Account</a></li>
					</ul>
				</div>
				<div class="navbar-content ml-auto d-sm-none">
					<div class="dropdown">
						<button class="btn" data-toggle="dropdown" type="button"><i class="fa fa-bars"></i></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="/" class="dropdown-item">GTA V</a>
							<a href="/vpn/" class="dropdown-item">VPN</a>
							<a href="/help/" class="dropdown-item">Help</a>
							<a href="/account/" class="dropdown-item">Account</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="content-wrapper">
			<div class="container-xl">
				<div class="content">
					<h1>Stand Changelog</h1>
					<?php
					function printHeader($name, $date)
					{
						echo '<h3>'.$name.' <span class="font-size-18 text-muted">'.$date.'</span></h3>';
					}
					require "../components/changelog.php";
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
