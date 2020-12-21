<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body>
	<h1> Bienvenu dans la page d'inscription </h1>
	<form  method="post" action="inscriptionTraitement.php" >
		<table>
			<tr>
				<td>nom</td>
				<td> : <input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>prenom</td>
				<td> : <input type="text" name="prenom"></td>				
			</tr>
			<tr>
				<td>cne/cin</td>
				<td> : <input type="text" name="cne_cin"></td>
				
			</tr>
			<tr>
				<td>email</td>
				<td> : <input type="text" name="email"></td>
			</tr>
			<tr>
				<td>mdp</td>
				<td> : <input type="text" name="mdp"></td>
			</tr>
			<tr>
				<td>confirmer le mdp</td>
				<td> : <input type="text" name="conf_mdp"> </td>				
			</tr>
			<tr>
				<td><input type="submit" name="" value="Valider"> </td>
			</tr>
		</table>
	</form>

</body>
</html>