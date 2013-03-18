<?php
session_start();
require("functions.php");

if(isset($_GET["s"])){ $s = stripslashes(htmlentities($_GET["s"])); } else { $s = ""; }
?>
<!Doctype>
<html>
<head>
<title>Bizzar Homepage</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<div id="wrapper">

  <div id="header">
    <h1><a href="/custom/homepage">Bizzar Homepage</a></h1>
  </div>

  <div class="full-width">
    <form method="get" action="/custom/homepage">
      <input type="text" name="s" size="60" value="<?php echo $s; ?>" /> <input type="submit" value=" Search "/>
    </form>
  </div>

  <?php
  if(isset($_GET["s"])){ ?>
  <div class="searchres">
    Showing search results for... <strong><?php echo $s; ?></strong><br/>
	<pre>
	<?php
	$feed = "http://www.bing.com/search?q=".htmlspecialchars($s)."&format=rss";
	echo "Using: ".$feed."<br>";
	$results = process_rss_feed($feed);
	var_dump($results);
	?>
	</pre>
  </div>
  <?php } else { ?>

  <a href="http://www.google.com" target="_blank">
  <div class="floater weburl">
    google.com
  </div>
  </a>

  <a href="http://www.facebook.com" target="_blank">
  <div class="floater weburl">
    facebook.com
  </div>
  </a>

  <a href="http://www.gmail.com" target="_blank">
  <div class="floater weburl">
    gmail.com
  </div>
  </a>

  <a href="http://www.thepiratebay.se" target="_blank">
  <div class="floater weburl">
    thepiratebay.se
  </div>
  </a>

  <!--
  <a href="http://www.google.com" target="_blank">
  <div class="floater weburl">
    test
  </div></a>

  <a href="http://www.google.com" target="_blank">
  <div class="floater weburl">
    test
  </div></a>
  -->

  <div style="clear:both;"></div>
  <?php } ?>

  <div id="footer">
    &copy; 2012-2013 Brad Derstine, BizzarTech.com
  </div>
</div><!-- #wrapper -->

</body>
</html>