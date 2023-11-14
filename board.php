<html>
<head>
</head>
<body>
	<div id="board_area">
		<h1>BOARD</h1>
		<table class="list-table">
			<thead>
				<tr>
					<th width="70">Number</th>
					<th width="120">Writer</th>
					<th width="250">Title</th>
				</tr>
			</thead>

<?php
	$db_conn = mysqli_connect("127.0.0.1", "han", "1234", "board");
	if($db_conn == false){
		echo mysqli_connect_error();
	}
	else{
		$query = "select * from board";
		$result = mysqli_query($db_conn, $query);

		if($result == false){
			echo mysqli_error($db_conn);
		}else{
			while($row = mysqli_fetch_array($result)){
				
		
?>
			<tbody>
				<tr>
					<td width="70"><a href="read.php?seq=<?php echo $row['seq'];?>"><?php echo $row['seq'];?></a></td>
					<td width="120"><?php echo $row['id'];?></td>
					<td width="250"><?php echo $row['title'];?></td>
				</tr>
			</tbody>
		<?php } } } ?>
	</table>
	<div id="write_btn">
		<a href="insert.html"><button>Write</button></a>
	</div>
	<div id="search_btn">
		<a href="search.html"><button>Search</button></a>
	</div>
	</div>
</body>
</html>




