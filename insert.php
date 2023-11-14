<?php
	session_start();
	$title = $_POST['title'];
	$content = $_POST['content'];
	$id = $_SESSION['id'];

	$tmp_file = $_FILES['uploadFile']['tmp_name'];
	$o_name = $_FILES['uploadFile']['name'];
	$filename = iconv("UTF-8", "EUC-KR", $_FILES['uploadFile']['name']);

	echo "{$filename}";
	$uploadDirectory = "/home/qwer/web/uploadFile/".$filename;
	move_uploaded_file($tmp_file,$uploadDirectory);

		
	$db_conn = mysqli_connect("127.0.0.1", "han", "1234", "board");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		
		$query = "insert into board(id,title,content,file) values('".$id."','".$title."','".$content."','".$o_name."')";
	
		$result = mysqli_query($db_conn, $query);
		
		if($result == false) {
			echo mysqli_error($db_conn);
		}else{
			echo "insert success!";
?>
			<div id="board_btn">
				<a href="board.php"><button>Board</button></a>
			</div>
<?php
		}
		mysqli_close($db_conn);
	}

?>
