<?php
	$seq = $_GET['seq'];
	$db_conn = mysqli_connect("127.0.0.1","han","1234","board");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		$query = "select * from board where seq='".$seq."'";
		$result = mysqli_query($db_conn, $query);
		if($result == false){
			echo mysqli_error($db_conn);
		}
		else{
			$row = mysqli_fetch_array($result);
?>
<div id="board_read">
	<h2><?php echo "Title :  {$row['title']}"; ?> </h2>
		<div id="user_id">
			<?php echo "Writer : {$row['id']}";?>
		</div><hr>
		<div id="content">
			<?php echo nl2br($row['content']);?>
		</div><hr>
		<div>
		File : <a href="download.php?file=<?php echo $row['file']; ?>"><?php echo $row['file'];?></a>
		</div>
	<div id="other">
		<ul>
			<li><a href="board.php">Board</a></li>
			<li><a href="update.php?seq=<?php echo $row['seq']; ?>">Update</a></li>
			<li><a href="delete.php?seq=<?php echo $row['seq']; ?>">Delete</a></li>
		</ul>
	</div>
</div>
<?php
			}
	}
?>
