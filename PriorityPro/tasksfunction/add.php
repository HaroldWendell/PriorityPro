<?php

if(isset($_POST['title'])){
    require '../connection.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../tasks.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO tasks(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../tasks.php?mess=success"); 
        }else {
            header("Location: ../tasks.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../tasks.php?mess=error");
}