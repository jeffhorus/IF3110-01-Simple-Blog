<?php
// iclude functions.php
include 'functions.php';

// operasi
if (isset($_GET['pid'])){
	$pid = $_GET['pid'];
	connect_db();
	$selectionQuery = "SELECT * FROM sb_posts WHERE id_post=" . $pid;
	$result = run_query($selectionQuery);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Jeffrey Lingga | Edit Post</title>
</head>

<body class="default">
<div class="wrapper">
<?php if($result){ $row = mysqli_fetch_array($result); 
	$valueFeatured = "";
	if ($row['featured'] == 1) $valueFeatured=" checked";
?>
		
		<nav class="nav">
			<a style="border:none;" id="logo" href="index.php"><h1>Jeffrey<span>-</span>Lingga</h1></a>
			<ul class="nav-primary">
				<li><a href="new_post.php">+ Tambah Post</a></li>
			</ul>
		</nav>
		
		<article class="art simple post">
			
			
			<h2 class="art-title" style="margin-bottom:40px">-</h2>
		
			<div class="art-body">
				<div class="art-body-inner">
					<h2>Edit Post</h2>
		
					<div id="contact-area">
						<form name="inputanpos" method="post" onSubmit="return validateForm()" action="post_processor.php?action=edit">
                        	<input type="hidden" name="pid" value="<?php echo $pid;?>">
							<label for="Judul">Judul:</label>
							<input type="text" name="Judul" id="Judul" value="<?php echo $row['judul']?>">
							<input type="checkbox" name="Featured" id="Featured" <?php echo $valueFeatured; ?>> featured<br>
		
							<label for="Tanggal">Tanggal:</label>
							<input type="text" name="Tanggal" id="Tanggal" value="<?php echo $row['tanggal']?>">
							
							<label for="Konten">Konten:</label><br>
							<textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $row['konten']?></textarea>
		
							<input type="submit" name="submit" value="Simpan" class="submit-button">
						</form>
					</div>
				</div>
			</div>
		
		</article>
		
		<footer class="footer">
			<div class="back-to-top"><a href="">Back to top</a></div>
			<!-- <div class="footer-nav"><p></p></div> -->
			<div class="psi">&Psi;</div>
			<aside class="offsite-links">
				Asisten IF3110 /
				<a class="rss-link" href="#rss">RSS</a> /
				<br>
				<a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
				<a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
				<a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
				<br>
				<a class="twitter-link" href="#">Renusa</a> /
				<a class="twitter-link" href="#">Kelvin</a> /
				<a class="twitter-link" href="#">Yanuar</a> /
				
			</aside>
		</footer>
		<?php
	}
	else{
		echo 'query gagal';
	}
	disconnect_db();
}
else {
	echo 'tidak ada variable yang diset';
}
?>

</div>

<script type="text/javascript" src="assets/js/validator.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
	  function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
	  t=h.createElement(o);z=h.getElementsByTagName(o)[0];
	  t.src='//www.google-analytics.com/analytics.js';
	  z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
	  ga('create',ga_ua);ga('send','pageview');
</script>

</body>
</html>
