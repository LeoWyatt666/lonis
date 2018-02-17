<!DOCTYPE html>
<html class="no-js" lang="{language}" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>{site_name}</title>

	<base href="{base_url()}">

	<meta name="description" content="{site_name}"/>
	<meta property="og:locale" content="en_EN" />
	<meta property="og:type" content="statistics" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="{site_name}" />
	<meta property="og:url" content="{base_url()}" />
	<meta property="og:site_name" content="Lonis" />
	<meta property="article:section" content="" />
	<meta property="article:published_time" content="" />
	<meta property="article:modified_time" content="" />
	<meta property="og:updated_time" content="" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="{site_name}" />
	<meta name="twitter:title" content="{site_name}" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{ASSETS_CSS}

	<!-- <link href="assets/app.css" rel="stylesheet">
	<link href="assets/template/{template}/style.css" rel="stylesheet">
	<link href="assets/modules/{module}/{class}.css" rel="stylesheet"> -->
</head>

<link rel="canonical" href="{base_url()}" />
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- <script data-main="assets/app" src="assets/libraries/require/require.min.js"></script> -->
{ASSETS_JS}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<body bgcolor="black">
	<header role="heading">
		{HEADER}
	</header>
	<nav role="menubar" style="padding-top: 60px;">
		{NAV}
	</nav>

	<sidebar></sidebar>

	<main role="main" class="ui container ">
		<section class="ui secondary segment">
			<div id="cake"><i class="cake v{mt_rand(1, 6)}"></i></div>
			{CONTENT}
		</section>
	</main>

	<footer class="ui container">
		{FOOTER}
	</footer>

	<div style="position: fixed; bottom: 10px; right: 10px;" onclick="window.scrollTo(0,0);return!1;">
		<i class="icon icon-circle-up" style="font-size: 4em; color: rgba( 80, 80, 80, 0.5);"></i>
	</div>
</body>

</html>