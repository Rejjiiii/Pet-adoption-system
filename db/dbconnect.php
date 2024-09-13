<?php

		$con=new PDO("mysql:host=localhost;dbname=petadoptionsystem","root","");
		if (!$con) {
			echo "Database Not Connected";
		}

?>