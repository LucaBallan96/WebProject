<?php
    $target_dir = 'images/';
    $target_file = $target_dir.basename($_FILES['image']['name']);
    $uploadOk = 1;
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if everything is ok
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file))
            echo "Sorry, there was an error uploading your file.";
    }
?>