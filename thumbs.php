<?php
    $path = basename( $_FILES['uploaded_file']['name']);
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)
  }
?>