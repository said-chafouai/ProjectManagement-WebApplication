<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Regna Bootstrap Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!--==========================
Header
============================-->
        <header id="header">
            <div class="container">

                <div id="logo" class="pull-left">
                    <!--        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>-->
                    <!-- Uncomment below if you prefer to use a text logo -->
                    <h1><a href="#hero">ENSIAS</a></h1>
                </div>

            </div>
        </header><!-- #header -->

        <!--==========================
Hero Section
============================-->
        <section id="hero">
            <div class="hero-container">
                <h1>Bienvenu a ENSIAS PROJECTS</h1>
                <h2>Une plateforme pour la gestion et le suivis des PFA</h2>
                <a href ="#about" class="btn-get-started" data-toggle="modal" data-target="#seConnecter">Se Connecter</a>
                <a href ="#about" class="btn-get-started" data-toggle="modal" data-target="#sInscrire">s'inscrire</a>
            </div>
        </section><!-- #hero -->

        <!-- Trigger the modal with a button -->

        <!-- Modal -->
        <div id="seConnecter" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="accueilTraitement.php" method="post" id="sign_in_form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="login" placeholder="Login">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                            </div>
                            <div class="form-group text-danger">
                                <label class=""> mot de passe incorrect</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form> 
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal --> <!-- inscription -->
        <div id="sInscrire" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="sign_up_form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                            </div>
                            <div class="form-group">
                                <select name="fonction" id="fonction" class="form-control">
                                    <option value="" selected>Choisissez...</option>
                                    <option value="enseignant" onclick="professeur()">Professeur</option>
                                    <option value="doctorant" onclick="etudiant()">Etudiant</option>
                                </select>
                            </div>

                            <div id="demo" class="form-group"></div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="mdp" placeholder="Mot de Passe">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="conf_mdp" placeholder="Cofiramtion de mot de passe">
                            </div>

                            <button type="submit" class="btn btn-succees pull-right">Inscription</button>
                        </form> 
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>

            </div>
        </div>

        <!--==========================
Footer
============================-->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">

                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>ENSIAS Tim</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">ENSIAS Tim</a>
                </div>
            </div>
        </footer><!-- #footer -->

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Template Main Javascript File -->
        <script src="js/main.js"></script>

        <script src="js/jquery-1.11.1.js"></script>
        <script src="js/jquery.validate.js"></script>   
        <script type="text/javascript">

            $( document ).ready( function () {
                $( "#sign_in_form" ).validate( {
                    rules: {
                        login: {
                            number : true,
                            required: true
                        },
                        mdp: {
                            required: true	
                        },
                    },
                    messages: {
                        login: {
                            required : "login requis",
                            number : "login n'est pas valide"

                        },
                        mdp: {
                            required: "Mot de passe requis"
                        }
                    },
                    errorElement: "em",
                    errorPlacement: function ( error, element ) {
                        // Add the `help-block` class to the error element
                        error.addClass( "help-block" );

                        if ( element.prop( "type" ) === "checkbox" ) {
                            error.insertAfter( element.parent( "label" ) );
                        } else {
                            error.insertAfter( element );
                        }
                    },
                    highlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
                    }
                } );
            } );

        </script> <!-- Connexion -->
        <script>
            
            function professeur() {
                
				var xhttp = new XMLHttpRequest();
			  	xhttp.onreadystatechange = function() {
			    	if (this.readyState == 4 && this.status == 200) {
			      	document.getElementById("demo").innerHTML = this.responseText;
			    	}
			 	};

			  	xhttp.open("GET", "inscrPages/etudiant.html", true);
			  	xhttp.send();
			};

			function etudiant() {
			  	var xhttp = new XMLHttpRequest();
			  	xhttp.onreadystatechange = function() {
			    	if (this.readyState == 4 && this.status == 200) {
			      	document.getElementById("demo").innerHTML = this.responseText;
			    	}
			  	};

			  	xhttp.open("GET", "inscrPages/professeur.html", true);
			  	xhttp.send();
			};
            
            

			$( document ).ready( function () {
				$( "#sign_up_form" ).validate( {
					rules: {
						nom: {
							required: true
						},
						prenom: {
							required: true	
                        },
                        fonction: {
							required: true	
                        },
                        cin: {
							required: true	
                        },
                        cne: {
							required: true	
                        },
                        email: {
							required: true	
                        },
                        mdp: {
							required: true	
                        },
                        conf_mdp: {
							required: true	
                        },
					},
					messages: {
						login: {
                            required : "login requis",
							number : "login n'est pas valide"
							
						},
						mdp: {
							required: "Mot de passe requis"
						}
					},
					errorElement: "em",
					errorPlacement: function ( error, element ) {
						// Add the `help-block` class to the error element
						error.addClass( "help-block" );

						if ( element.prop( "type" ) === "checkbox" ) {
							error.insertAfter( element.parent( "label" ) );
						} else {
							error.insertAfter( element );
						}
					},
					highlight: function ( element, errorClass, validClass ) {
						$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
					},
					unhighlight: function (element, errorClass, validClass) {
						$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
					}
				} );
			} );

    </script> <!-- Inscription -->

    </body>
</html>
