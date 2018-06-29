<?php
    session_start();

    if ( isset($_POST["titlename"]) && isset($_POST["abstract"]) ){

		// File upload
		$target_dir = "../archiv/artikel/";
	
		$target_file = $target_dir . $_POST["titlename"] . ".pdf";
		
		$uploadOk = 1;
		$fileType = strtolower(pathinfo(basename($_FILES["uploadFile"]["name"]), PATHINFO_EXTENSION));
		
		
		// Check if file already exists
		if (file_exists($target_file)) 
		{
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["uploadFile"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		// Allow certain file formats
		if($fileType != "pdf") 
		{
			echo "Sorry, only PDF files are allowed.";
			$uploadOk = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) 
		{
			if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) 
			{
				echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
			} 
			else 
			{
				$uploadOk = 0;
				echo "Sorry, there was an error uploading your file.";
			}
		}
		if($uploadOk == 1)
		{
			try {
				$db = new PDO('sqlite:../SQLData/articles.db');
	
				$db->beginTransaction();
				$stmt = $db->prepare("INSERT INTO article (owner, abstract, title, author,statusOfArticle, uploadDate) VALUES (:owner,:abstract,:title,:author,:status,:uploadDate)");
				$stmt->bindParam(":owner", $userid);
				$stmt->bindParam(":abstract", $abstract);
				$stmt->bindParam(":title", $title);
				$stmt->bindParam(":author", $authors);
				$stmt->bindParam(":uploadDate", $date);
				$stmt->bindParam(":status", $status);
	
	
				$counter = -1;
				$authors = "";
				while ((++$counter) <= $_POST["authorCounter"]) {
					if (!isset($_POST["autorvorname-" . ($counter)])) {
						continue;
					};
					$authors = $authors . $_POST["autorvorname-" . ($counter)] . " " . $_POST["autornachname-" . ($counter)] . ", ";
				}
	
				$authors = substr($authors, 0, -2);
				$userid = $_SESSION['userId'];
				$abstract = $_POST['abstract'];
				$title = $_POST['titlename'];
				$date = date("d.m.Y, H:i:s");
				$status = 0;
	
				$stmt->execute();
				$db -> commit();
			} catch (Exception $ex){
				$db -> rollBack();
				echo "Error: ". $ex;
			}
			
			header("Location: ../../autor.php");
			exit();
		}
    }
 ?>
