<?php
    
    $info = pathinfo($_FILES['image']['name']);
    $ext = $info['extension'];
    $newname = 'newImage.'.$ext;
    $target = 'images/'.$newname;
    move_uploaded_file($_FILES['image']['tmp_name'],$target);

?>