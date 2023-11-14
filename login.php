<?php
	session_start();
	$id = $_GET['id'];
	$pw = $_GET['pw'];

	$db_conn = mysqli_connect("127.0.0.1", "han","1234","login");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		$query = "select * from user  where id='{$id}' and pw='{$pw}'";
		$result = mysqli_query($db_conn, $query);


		if($result == false){
			echo mysqli_error($db_conn);
		}
		else{
			$row = mysqli_fetch_array($result);
			if($row){
				
				$_SESSION['id'] = $id;
				header("location: board.php");
			}
			else{
				echo "login failed";
			}
		}
		mysqli_close($db_conn);
	}
?>
