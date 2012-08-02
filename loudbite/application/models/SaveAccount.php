<?php
class SaveAccount {
	public function saveAccount($username, $password, $email) {
		$username = $this->_db->escape($username);
		$password = $this->_db->escape(password);
		$email = $this->_db->escape($email);
		
		$dbconn = mysqli("localhost",
						"root",
						"");
		$dbconn->select_db("zend_test");
		
		$stmt = "INSERT INTO Accounts(username, password,
				email) VALUES('".$username."', 
							  '".$password."',
							  '".$email."')";
		
		$dbconn->query($stmt);
		$dbconn->close();
	}
}