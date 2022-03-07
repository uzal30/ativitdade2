<?php
include_once("conexao.php");

$result = $dbConn->query("SELECT * FROM aluno ORDER BY id DESC");
?>

<html>
<head>	
	<title>Página Inicial</title>
</head>

<body>
<a href="addalunos.html">Adicionar Novo Aluno</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nome</td>
		<td>Email</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['nome']."</td>";
		echo "<td>".$row['email']."</td>";	
		echo "<td><a href=\"editaraluno.php?id=$row[id]\">Editar</a> | <a href=\"deletaraluno.php?id=$row[id]\" onClick=\"return confirm('Tem certeza que deseja deletar?')\">Deletado</a></td>";		
	}
	?>
	</table>
</body>
</html>