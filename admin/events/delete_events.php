<?php
require_once ('../dbhelper.php');

if(isset($_GET['id_ev'])) {
	$id_ev = $_GET['id_ev'];

	//B1. Mo ket noi toi CSDL
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
	mysqli_set_charset($conn, 'utf8');

	//B2. Them/sua/xoa/lay du lieu tu database -> insert/update/delete/select
	$sql = "delete from events where id_ev = $id_ev";
	mysqli_query($conn, $sql);

	//B3. Dong ket noi toi CSDL
	mysqli_close($conn);
}

header('Location: list_events.php');
?>