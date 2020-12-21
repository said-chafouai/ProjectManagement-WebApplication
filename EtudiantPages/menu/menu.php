 <!--    alia_gauche-->
    <div class="sidebar" data-color="red" data-image="img/sidebar-5.jpg">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
<div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="" class="simple-text">
                            <?php echo $etudiant->nom.' '.$etudiant->prenom; ?>
                        </a>
                    </div>

                    <ul class="nav">
                        <li <?php if($nomPage == "notification.php") echo "class='active'";?> >
                            <a href="notification.php">
                                <i class="pe-7s-graph"></i>
                                <p>Notification</p>
                            </a>
                        </li>
                        <li <?php if($nomPage == "profile.php") echo "class='active'";?> >
                            <a href="profile.php">
                                <i class="pe-7s-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li <?php if($nomPage == "rendez_vous.php") echo "class='active'";?> >
                            <a href="rendez_vous.php">
                                <i class="pe-7s-note2"></i>
                                <p>Rendez-vous</p>
                            </a>
                        </li>
                        <li <?php if($nomPage == "compte_rendu.php") echo "class='active'";?> >
                            <a href="compte_rendu.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Compte rendu</p>
                            </a>
                        </li>
                        <li <?php if($nomPage == "binome.php") echo "class='active'";?> >
                            <a href="binome.php">
                                <i class="pe-7s-science"></i>
                                <p>Choisir binome</p>
                            </a>
                        </li>
                        <li <?php if($nomPage == "sujets.php") echo "class='active'";?> >
                            <a href="sujets.php">
                                <i class="pe-7s-map-marker"></i>
                                <p>Classer les  sujets</p>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>