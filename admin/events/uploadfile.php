<?php 
	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    echo "File is not an image.";
	    $uploadOk = 0;
	  }
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  echo '<script type="text/javascript>';
      echo 'alert("Sorry, file already exists.");';
      echo '</script>';
	  $uploadOk = 0;
	}

	// // Check file size
	// if ($_FILES["fileToUpload"]["size"] > 500000) {
	//   echo "Sorry, your file is too large.";
	//   $uploadOk = 0;
	// }

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo '<script type="text/javascript>';
      echo 'alert("Sorry, your file was not uploaded.");';
      echo '</script>';
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo '<script type="text/javascript>';
        echo 'alert("Them moi thanh cong");';
        echo '</script>';
	  } else {
        echo '<script type="text/javascript>';
        echo 'alert("Them moi that bai");';
        echo '</script>';
	  }
	}
	$ev_avatar = $target_dir.htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
 ?>