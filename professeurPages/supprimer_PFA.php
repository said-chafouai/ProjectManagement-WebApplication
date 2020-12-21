<?php

if (isset ($_POST['valider']))
{
    session_start();
    $con=mysqli_connect("localhost","root","","demo");
    $nom_projet=$_POST['nom_projet'];
    
    if( $con->connect_error){
        
        die("connection failed".$con->connect_error);
    }
    
    $sql = "delete from projet where nom_projet='$nom_projet' ";
    if($con->query($sql)==TRUE){
        echo "removing succefully";
    }
    else {
        echo "error removing".$con->error;
    }
    $con->close();
}
?>