<?php

	include('_inc/function.php');
	include('_inc/php-sitemap-generator/SitemapGenerator.php');

   	// create object
    $sitemap = new SitemapGenerator("http://diakritika.webstore.sk/");
    $sitemap->addUrl("http://diakritika.webstore.sk/", date('c'), 'daily', '1');

    // create sitemap
    $sitemap->createSitemap();

    // write sitemap as file
    $sitemap->writeSitemap();

    // update robots.txt file
    $sitemap->updateRobots();

    // submit sitemaps to search engines
    $sitemap->submitSitemap();

	$text = isset($_POST['text']) ? $_POST['text'] : false;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url"                content="http://diakritika.webstore.sk/" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="Odstráň diakritiku" />
	<meta property="og:description"        content="Aplikácia, ktorá z textu odstráni interpunkciu (dĺžne, mäkčene)" />
	<meta property="og:image"              content="http://diakritika.webstore.sk/assets/img/logo.png" />

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Odstráň diakritiku</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Bootstrap -  United, https://bootswatch.com/united/ -->
    <link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script>
		function eraseContentForm() {
			document.getElementById("formTextarea").value = "";
		}
	</script>

  </head>
<body>
	<?php include_once("analyticstracking.php") ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="page-header text-center">
              		<h1>Odstráň diakritiku</h1>
        		</div>
			</div>
			<!-- .col -->
		</div>
		<!-- .row -->
	</div>
	<!-- .container -->

	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<form class="form-horizontal" action="" method="post">

				    <div class="form-group">
				        <textarea id="formTextarea" class="form-control" rows="10" placeholder="vlož text, z ktorého chceš odstrániť diakritiku" name="text"><?php  if ( $text ) echo remove_diacritics( $text ) ?></textarea>
				        <span class="help-block">vlož text, z ktorého chceš odstrániť diakritiku</span>
				    </div>


				    <div class="form-group">
				        <button type="submit" class="btn btn-primary">Odstráň diakritiku</button>
				        <button type="reset" class="btn btn-link" onclick="javascript:eraseContentForm();" id="button_reset">Vymaž text</button>
				    </div>

				</form>
			</div>
			<!-- .col -->

		</div>
		<!-- .row -->

	</div>
	<!-- .container -->



</body>
</html>
