<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use fb\classes\base;
use fb\classes\comment;

$path = '../usersImg/';

$types = array('image/gif', 'image/png', 'image/jpeg');

if (!is_dir($path)) {
    mkdir($path, 0777, true);
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
    if (isset($_FILES['picture'])) {
        if (!in_array($_FILES['picture']['type'], $types))
            die('<p>Запрещённый тип файла. <a href="?">Допустимы JPG,PNG,GIF</a></p>');
        else{
        $uploadfile = $path . basename($_FILES['picture']['name']);
        move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile);
        $comment = new comment($_POST['name'], $_POST['email'], $_POST['text'], $uploadfile);}

        $size=GetImageSize ($uploadfile);
        $src=ImageCreateFromJPEG ($uploadfile);
        $iw=$size[0];
        $ih=$size[1];

        if($ih>240){
        $koe=$iw/240;
        $new_h=ceil ($ih/$koe); 
        $dst=ImageCreateTrueColor (240, $new_h);
        ImageCopyResampled ($dst, $src, 0, 0, 0, 0, 240, $new_h, $iw, $ih);
        ImageJPEG ($dst, $uploadfile, 100);
        imagedestroy($src);
        }
    } else {
        $comment = new comment($_POST['name'], $_POST['email'], $_POST['text']);
    }
    $comment->saveToDB();
    unset($comment);

    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
$bd = new base();
$comments = $bd->select('*', 'comment', '1');
$comments = array_reverse($comments);

require_once "../templates/form.php";
