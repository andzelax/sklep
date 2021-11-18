<?php
require_once 'database.php';
//error_reporting(E_ALL ^ E_NOTICE);
session_start();

              if(isset($_POST['submit']) && $_POST['email']!='' && $_POST['passw']) {
                
                $stmt = $pdo->prepare('SELECT * FROM logowanie WHERE email = :email AND haslo = :passw');
                $stmt->bindValue(':email',$_POST['email']);
                $stmt->bindValue(':passw',$_POST['passw']);
                $_SESSION['user']=$_POST['email'];
                $stmt->execute();
                echo '<meta http-equiv="refresh" content="1;url=./index.php">';
                  //
                
                
            }
        
             ?>