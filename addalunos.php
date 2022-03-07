<html>
<head>
	<title>Adicionar Alunos</title>
</head>

<body>
<?php
include_once("conexao.php");

if(isset($_POST['Enviar'])) {	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
		
	// checking empty fields
	if(empty($nome) || empty($email)) {
				
		if(empty($nome)) {
			echo "<font color='red'>Campo Nome está vazio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Campo Email está vazio.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		$sql = "INSERT INTO aluno(nome, email) VALUES(:nome, :email)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':nome', $nome);
		$query->bindparam(':email', $email);
		$query->execute();

		echo "<font color='green'>Aluno cadastrado com sucesso.";
		echo "<br/><a href='index.php'>Mostrar resultado</a>";
	}
}
?>
</body>
</html>