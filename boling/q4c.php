
<?php

	function login($username,$password){

			if($username == "admin" && $password == "5ecr34")
			{
					$_SESSION['username'] = $uname;
					return true;
			}
			else{
					return false;
			}
	}

?>





