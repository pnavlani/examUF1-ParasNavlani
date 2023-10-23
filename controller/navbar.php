<?php
require_once '../model/pdo-users.php';
require_once '../controller/session.php';

    $userId = getSessionUserId();
    
    $anonUser = $userId == 0;

    if (!$anonUser) {        
        $nickname = getUserNicknameById($userId);
    } else $changePasswordVisibility = '';
    
    $file = pathinfo($_SERVER['PHP_SELF'])['filename'];
    
    $homeActive = $file == "index" ? "active" : "";
    $loginActive = $file== "login" ? "active" : "";
    $signupActive = $file == "sign-up" ? "active" : "";
    $createActive = $file == "edit" ? "active" : "";
    $passwordActive = $file == "change-password" ? "active" : "";  
    //ex6  
    $connexio = getConnection();
    if (isset($_POST['donarBaixa'])) {
        $stmt = $connexio->prepare("DELETE FROM users WHERE id = $userId");
        $stmt->execute();
        session_destroy();
        header('Location: index.php');    
    } 

    //require_once '../view/navbar.view.php';
    //ex2
    include '../view/navbar.view.php';
