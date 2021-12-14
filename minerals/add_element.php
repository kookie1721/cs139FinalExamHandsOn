<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("INSERT INTO elements (name, group_id, atomic_no, atomic_weight, description) VALUES (:name, :group_id, :atomic_no, :atomic_weight, :description)");

			//bind
			$sql->bindParam(':name', $_POST['name']);
            $sql->bindParam(':group_id', $_POST['groupID']);
			$sql->bindParam(':atomic_no', $_POST['atomicNo']);
            $sql->bindParam(':atomic_weight', $_POST['atomicWeight']);
            $sql->bindParam(':description', $_POST['description']);

			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $sql->execute()) ? 'Element was added successfully' : 'Something went wrong. Cannot add element.';
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../index.php');
	
?>