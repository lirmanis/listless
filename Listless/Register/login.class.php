<?php 
class LoginUser{

	private $username = "";
	private $password = "";
	public $error = "";
	public $success = "";
	private $storage = "Register/data.json";
	private $stored_users = "";

	public function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}


	private function login(){
		foreach ($this->stored_users as $user) {
			if($user['username'] == $this->username){
				if(password_verify($this->password, $user['password'])){
					session_start();
					$_SESSION['user'] = $this->username;

					// Load this user's saved level progress
					$_SESSION['level']     = isset($user['level'])     ? $user['level']     : 1;
					$_SESSION['Completed'] = isset($user['Completed']) ? $user['Completed'] : 0;

					header("location: account.php"); exit();
				}
			}
		}
		return $this->error = "Wrong username or password";
	}

}