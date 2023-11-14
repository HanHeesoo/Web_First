<?php
	$seq = $_GET['seq'];
	$db_conn = mysqli_connect("127.0.0.1", "han", "1234", "board");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		$query = "delete from board where seq='$seq';";
		$result = mysqli_query($db_conn, $query);
		if($result == false){
			echo mysqli_error($db_conn);
		}
		else{
			echo "Delete Success";
		
?>
<div id="board_btn">
	<a href="board.php"><button>Board</button></a>
</div>
<?php
		}
	}
?>
