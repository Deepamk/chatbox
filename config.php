<?php 
		
		function connection() {

				$conn = mysqli_connect("localhost:3306","root","","chatbox") or die("could not connect to the database");
				if(!$conn){
					echo "{'could not connect'}";

				}
				else{
					return $conn;
				}

		}	
		connection();



?>