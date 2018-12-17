<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Practice site</title>
</head>
<body>
	<header>
		<nav>
			<ul class="navigation">
				<li><a href="#">Home</a></li>
				<li><a href="./functions.php">functions.php</a></li>
				<li><a href="./forum.php">forum</a></li>
			</ul>
		</nav>
	</header>
	<div class="main-wrapper">
		<div class="sidebar">
			<ul>
				<li>Hey</li>
				<li>This</li>
				<li>Sidebar</li>
			</ul>
		</div>

		<div class="main-content">
			<h1>Linus practice site</h1>
			<p>Welcome to this site. I will use it to practice</p>
			<ul>
				<li>HTML</li>
				<li>CSS</li>
				<li>JavaScript</li>
				<li>PHP</li>
				<li>MySQL</li>
			</ul>
			<p>and much more!</p>
		</div>
		<div class="comment-field">
			<form method="post" action="functions.php">
				Name:<input type="text" name="Name" placeholder="Name here"><br>
					<textarea name="Comment" id="comment" placeholder="Comment here"></textarea><br>
					<input type="submit" name="submit" value="Submit"><br>
			</form>
	
			<div class="comment-field">
				<?php
				$mysqli = new mysqli('127.0.0.1', 'root', '', 'posts');
				$result = $mysqli->query("SELECT * FROM posts ORDER BY 'Time' DESC");
				

				if($result){
					  while($row = $result->fetch_object()){

					    $Name = htmlspecialchars($row->Name);
					    $Comment = htmlspecialchars($row->Comment);
					    $Time = htmlspecialchars($row->Time);
				print("<p class='comment'>$Name : $Comment ($Time)<br></p>");
					  }
					}
				?>

			</div>
	</div>
</body>
</html>