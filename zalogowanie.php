<?php
require_once 'database.php';
//error_reporting(E_ALL ^ E_NOTICE);
session_start();

              if(isset($_POST['submit']) && $_POST['email']!='' && $_POST['passw']) {
                
                $stmt = $pdo->prepare('SELECT * FROM uzytkownicy WHERE email = :email AND haslo = :passw');
                
                $stmt->bindValue(':email',$_POST['email']);
                $stmt->bindValue(':passw',$_POST['passw']);
                $spr = $stmt->fetchAll();
                if($spr==null){
                  echo 'Nie ma takiego uzytkownika';
                }
                else{
                  $_SESSION['user']=$_POST['email'];
                echo '<meta http-equiv="refresh" content="1;url=./index.php">';
                }
                
                  //
                
                
            }
        
             ?>