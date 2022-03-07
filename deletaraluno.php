<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM aluno WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

header("Location:index.php");
?>