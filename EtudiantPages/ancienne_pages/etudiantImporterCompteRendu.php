<!DOCTYPE html>
<html>
<head>
	<title>Compte rendu</title>
</head>
<body>
	<h1>Page pour charger les comptes rendu</h1>
	<form action="traitementTelechargerCompteRendu.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload Image" name="submit">
	</form>

</body>
</html>