<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
if(isset($_POST['userid'])) {
    require_once 'db_connect.php';
    $userid = $_POST['userid'];
    $documentRoot = '/Applications/XAMPP/xamppfiles/htdocs/fyp/';
    $targetFolder = 'gallery/' . $userid; // Relative to the root

    if (!file_exists($documentRoot . $targetFolder)) {
        mkdir($documentRoot . $targetFolder, 0777, true);
    }
    $verifyToken = md5('unique_salt' . $_POST['timestamp']);
    if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
        $tempFile = $_FILES['Filedata']['tmp_name'];
        $originalFileName = $_FILES['Filedata']['name'];
        $file_extension = strrchr($originalFileName, ".");
        $newFileName = uniqid() . $file_extension;
        $targetPath = $documentRoot . $targetFolder;
        // $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
        $targetFile = rtrim($targetPath,'/') . '/' . $newFileName;
        // Validate the file type
        $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
        $fileParts = pathinfo($originalFileName);

        if (in_array($fileParts['extension'],$fileTypes)) {
            if(move_uploaded_file($tempFile,$targetFile)) {
                $query = "  
                INSERT gallery (userid, filename) VALUES('" . $userid . "', '" . $newFileName ."')
                ";  
                $result = mysqli_query($DBcon, $query);  
                echo '1';
            } else {
                echo '2';
            }
        } else {
            echo 'Invalid file type.';
        }
    }
}

?>