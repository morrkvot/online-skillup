
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "posts";

// CONNECT
//mysqliクラスのオブジェクトを作成
$mysqli = new mysqli('127.0.0.1', 'root', '', 'posts');
//エラーが発生したら
if ($mysqli->connect_error){
  print("接続失敗：" . $mysqli->connect_error);
  exit();
} else {
	echo "Connected to MySQL";
}


// EXECUTE
//プリペアドステートメントを作成　ユーザ入力を使用する箇所は?にしておく
$stmt = $mysqli->prepare("INSERT INTO posts (Name, Comment) VALUES (?, ?)");
//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
//?の位置に値を割り当てる
$stmt->bind_param('ss', $_POST["Name"], $_POST["Comment"]);
//実行
$stmt->execute();

header("localhost/practicesite/");

echo "New comments created successfully! \n Returning!";


					//datasテーブルから日付の降順でデータを取得
					$result = $mysqli->query("SELECT * FROM posts ORDER BY 'Time' DESC");
					if($result){
					  //1行ずつ取り出し
					  while($row = $result->fetch_object()){
					    //エスケープして表示
					    $Name = htmlspecialchars($row->Name);
					    $Comment = htmlspecialchars($row->Comment);
					    $Time = htmlspecialchars($row->Time);
					    print("$Name: $Comment ($Time)<br>");
					  }
					}


$stmt->close();
$mysqli->close();
echo gettype($mysqli);

header('Location: index.php');

?>
