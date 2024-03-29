<?php
/*
Copyright (c) 2021 Praveen Kumar (zeroappz.com)
*/
require_once('includes.php');

// A list of permitted file extensions

$allowed = array('zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(check_allow()) {
        if (move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/' . $_FILES['upl']['name'])) {
            echo '{"status":"success"}';
            exit;
        }
    }
}

echo '{"status":"error"}';
exit;