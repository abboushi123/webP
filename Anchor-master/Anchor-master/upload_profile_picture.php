<?php
session_start();

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($file['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowed_types)) {
        echo 'Invalid file type';
        exit;
    }
    if (!move_uploaded_file($file['tmp_name'], $target_file)) {
        echo 'Failed to upload file';
        exit;
    }
    $_SESSION['profpic'] = $target_file;
    echo $target_file;
}
?>
<!--x-->