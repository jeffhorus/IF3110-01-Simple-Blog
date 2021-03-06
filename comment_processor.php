<?php
	include 'functions.php';

	connect_db();
	$pid = $_GET['pid'];
	
	if(isset($_GET['nama']) && isset($_GET['email']) && isset($_GET['komentar'])){
		$name = $_GET['nama'];
		$email = $_GET['email'];
		$comment = $_GET['komentar'];
		$insertQuery = "INSERT INTO sb_comments (nama, email, komentar, id_post) VALUES ('" .
			$name . "', '" . $email . "', '" . $comment . "', '" . $pid . "')";
		$row = run_query($insertQuery);
	}
	$selectionQuery = "SELECT * FROM sb_comments WHERE id_post='" . $pid . "' ORDER BY timestamp DESC";
	$result = run_query($selectionQuery);
	while($row = mysqli_fetch_array($result)){
		$nama = $row['nama'];
		$timestamp = $row['timestamp'];
		$comment = $row['komentar'];
		$comment = str_replace("\n", "<br>", $comment);
		echo
		'<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href="post.php?pid=' . $pid . '">' . $nama . '</a></h2>
				<div class="art-list-time">' . commentTimeProcessor($timestamp) . '</div>
			</div>
			<p>' . $comment . '</p>
		</li>
		';
	}
	
	disconnect_db();
?>
