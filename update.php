<?php
	$seq = $_GET['seq'];
	
	$db_conn = mysqli_connect("127.0.0.1", "han","1234","board");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		$query = "select * from board where seq='".$seq."'";
		$result = mysqli_query($db_conn,$query);
		if($result == false){
			echo mysqli_error($db_conn);
		}
		else{
			$row = mysqli_fetch_array($result);
?>
	<form method="get" action="update_ok.php">
		<input type="hidden" name="seq" value="<?php echo $seq;?>">
		<input type="text" name="title" value="<?php echo $row['title'];?>"><br>
		<textarea name="content" cols="30" rows="10"><?php echo $row['content']; ?></textarea>
		<input type="submit" value="Update">
	</form>
<?php
		}
	}
?>

