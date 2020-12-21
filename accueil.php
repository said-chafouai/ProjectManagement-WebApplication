<!DOCTYPE html>
<html lang="eng">
<head>
	<title>Accueil</title>
	<!-- inclusion Generale #################################################"" -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="CSS\css\bootstrap.min.css" rel="stylesheet">
    <!-- <link href="presentation/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- ################################################################################ -->
	<link rel="stylesheet" type="text/css" href="presentation/css/accueilStyle.css">
	<style type="text/css">
	* { 
  		/*border: 1px solid black;*/
	}

	#form{
		padding-top: 200px; 
	}

	</style>

</head>
<body>
	<div class="container">
		<form action="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/accueilTraitement.php" method="post">
			<div class="form-group row" id="form">
				<label class="col-sm-1 col-form-label">Login</label>
				<div class="col-sm-2">
					<input type="text" name="login" class="form-control"  value="">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-1 col-form-label">Password</label>
				<div class="col-sm-2">
					<input type="password" name="mdp" class="form-control">
					<font color="red">erreur</font>
				</div>
			</div>
			<button class="btn btn-primary pull-right">Connexion</button>
			
		</form>
		<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/inscription.php" class="">Inscription</a>
	</div>
</body>
</html>