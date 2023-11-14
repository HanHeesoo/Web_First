<?php
	echo "Search Result <br>";
	$condition = $_GET['search_condition'];
	$data = $_GET['search_data'];

	$db_conn = mysqli_connect("127.0.0.1", "han", "1234", "board");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		if($condition == 'writer'){
			$query = "select * from board where id='{$data}'";
			$result = mysqli_query($db_conn, $query);
		}
		else if($condition == 'title'){
			$query = "select * from board where title like '%{$data}%'";
			$result = mysqli_query($db_conn, $query);
		}
		echo "<table style='border:1px solid; border-collapse:collapse'>";
		echo "<th style='border:1px solid'>Writer</th>";
		echo "<th style='border:1px solid'>Title</th>";

		if($result == false){
			echo mysqli_error($db_conn);
		}
		else{

			while($row = mysqli_fetch_array($result)){
				echo "<tr><td style='border:1px solid'>{$row['id']}</td>";
				echo "<td style='border:1px solid'>{$row['title']}</td></tr>";
			}
		mysqli_close($db_conn);
		}
	}
?>
	<div id="board_btn">
		<a href="board.php"><button>Board</button></a>
	</div>
