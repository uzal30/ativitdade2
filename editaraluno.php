<?php
include_once("conexao.php");

if(isset($_POST['editar']))
{	
	$id = $_POST['id'];
	
	$nome=$_POST['nome'];
	$email=$_POST['email'];	
	
	if(empty($nome) || empty($email)) {	
			
		if(empty($nome)) {
			echo "<font color='red'>Campo nome está vazio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Campo email está vazio.</font><br/>";
		}		
	} else {	
		$sql = "UPDATE aluno SET nome=:nome, email=:email WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':email', $email);
		$query->execute();
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];

$sql = "SELECT * FROM aluno WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $row['name'];
	$email = $row['email'];
}
?>
<html>
<head>	
	<title>Editar Alunos</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>