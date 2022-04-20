<?php

use Chat\invitation;
use Chat\Message;
use Chat\Utilisateur;

require 'controller/invitation.php';
require 'controller/Message.php';
require 'controller/Utilisateur.php';

// session function 

function checkSession(){
    if(empty($_SESSION)){
    header("location:login");
}
}

@session_start();
$user = new Utilisateur();
$invitation = new invitation();
$message = new Message();
if(!empty($_SESSION)){
$invitations = $invitation->mesInvitation($_SESSION['id']);
$allinvitations = $invitation->allInvitation($_SESSION['id']);
$allUsers = $user->trouverUtilisateur('',$_SESSION['id']);
$allMessages = $message->mesMessage($_SESSION['id']);
}
$homelocation = "location:home" ;
if(isset($_GET['action'])){
    if($_GET['action'] == 'check'){
        $user->login($_POST['email'],$_POST['password']);
    }elseif($_GET['action'] == 'login'){
        require 'view/connection.php';
    }elseif($_GET['action'] == 'inscription'){
        require 'view/inscription.php';
    }elseif($_GET['action'] == 'add'){
        $user->creeUtilisateur($_POST['email'],$_POST['password']);
    }elseif($_GET['action'] == 'home'){
        checkSession();
        require 'view/home.php';
    }elseif($_GET['action'] == 'search'){
        checkSession();
        $invitations = $invitation->mesInvitation($_SESSION['id']);
        $allUsers = $user->trouverUtilisateur($_POST['key'],$_SESSION['id']);
        require 'view/home.php';
    }elseif($_GET['action'] == 'request'){
        checkSession();
        $invitation->envoyerInvitation($_SESSION['id'],$_POST['request']);
        header($homelocation);
    }elseif($_GET['action'] == 'accept'){
        checkSession();
        if(isset($_POST['accept'])){
        $invitation->AccepterInvitaion($_POST['accept']);
        }elseif($_POST['refuse']){
        $invitation->refuserInvitation($_POST['refuse']);
        }
        header($homelocation);
    }elseif($_GET['action'] == 'send'){
        checkSession();
        $message->envoyermessage($_POST['message'],$_POST['send'],$_SESSION['id']);
        header($homelocation);
    }
}else{
    header("location:login");
}
?>