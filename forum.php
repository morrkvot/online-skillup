				<?php
				$mysqli = new mysqli('127.0.0.1', 'root', '', 'posts');
				$result = $mysqli->query("SELECT * FROM posts ORDER BY 'Time' DESC");
				

				if($result){
					  while($row = $result->fetch_object()){

					    $Name = htmlspecialchars($row->Name);
					    $Comment = htmlspecialchars($row->Comment);
					    $Time = htmlspecialchars($row->Time);
				print("<p>$Name : $Comment ($Time)<br></p>");
					  }
					}
				?>