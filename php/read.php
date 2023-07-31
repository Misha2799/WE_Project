<?php

include "db_conn.php";

$sql = "SELECT * FROM register ORDER by id DESC";
$result = mysqli_query($conn, $sql);