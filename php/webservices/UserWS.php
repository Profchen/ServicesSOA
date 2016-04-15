<?php

	require_once 'IWebService.php';
	require_once 'database/db_connect.php';

	const PARAM_ACTION = 'action';
	const REGISTER_USER = 'register';
	const LOGOUT_USER = 'logout';
	const GET_USERS = 'getall';
	const GET_VERIF_USER = 'login';
	const REMOVE_USER = 'remove';
	const MODIFY_USER = 'modify';
	const SELECT_USER = 'selectAdmin';
	const SQL_GET_ALL_USER = "SELECT us_id, us_pseudo, us_pwd FROM users";
	//const SQL_GET_VERIF_USER = "SELECT us_pwd FROM users WHERE us_pseudo=".$us_pseudo." AND us_pwd=".$us_pwd"";
	
	class UserWS implements IWebService
	{
		
		public function DoGet()
		{
			if (!isset($_GET[PARAM_ACTION]))
				Helper::ThrowAccessDenied();

			switch ($_GET[PARAM_ACTION])
			{
				case GET_VERIF_USER:
					return $this->getVerifUser();
				
				case GET_USERS:
					return $this->getAllUser();
					
				case LOGOUT_USER:
					return $this->logout();
					
				case REGISTER_USER:
					return $this->register();
					
				case REMOVE_USER:
					return $this->remove();
				
				case MODIFY_USER:
					return $this->modify();

				case SELECT_USER:
					return $this->select();

				default:
					Helper::ThrowAccessDenied();
					break;
			}
		}
		
		private function getVerifUser(){

                    
			$us_mail = $_GET['email'];
			$us_pwd = $_GET['password'];


			if (!isset($us_mail) || !isset($us_pwd))
				Helper::ThrowAccessDenied();

			
			MySQL::Execute("SELECT us_id, us_name, us_firstname, us_email, us_pwd, us_isAdmin FROM users WHERE us_email='".$us_mail."' AND us_pwd='".$us_pwd."'");
			$verif = MySQL::GetResult()->fetchAll();

			if (count($verif) !== 0) {
				$_SESSION['Logged'] = 1;
				// var_dump($_SESSION['Logged']);
				return true;
			} else {
				return false;
			}

		}
		
		private function logout(){
			
			if (isset($_SESSION['Logged']) && $_SESSION['Logged'] !== 0){
				$_SESSION['Logged'] = 0; 
				return true;
			}	
			return false;
			
		}
		
		private function getAllUser(){
			MySQL::Execute(SQL_GET_ALL_USER);

			return MySQL::GetResult()->fetchAll();
		}
		
		private function register(){
			
			if (!isset($_GET['email']) || !isset($_GET['prenom']) || !isset($_GET['nom']) || !isset($_GET['pseudo']) || !isset($_GET['pwd']) || !isset($_GET['ddn']) )
				Helper::ThrowAccessDenied();
			
			MySQL::Execute("INSERT INTO USERS (us_email, us_firstname, us_isAdmin, us_name, us_pseudo, us_pwd, us_ddn) VALUES ('" .$_GET['email']. "', '" .$_GET['prenom']. "', FALSE,
			'" .$_GET['nom']. "', '" .$_GET['pseudo']. "', '" .$_GET['pwd']. "', '" .$_GET['ddn']. "')");

			return true;
		}
		
		private function remove(){
			if (!isset($_GET['us_id']))
				Helper::ThrowAccessDenied();
			MySQL::Execute('DELETE FROM users WHERE us_id='.$_GET['us_id']);
  			header('Location: /SOA/Admin/alluser.php');

			
		}
		
		private function modify(){
			if (!isset($_GET['us_id']) || !isset($_GET['us_pseudo']) || !isset($_GET['us_pwd']))
				Helper::ThrowAccessDenied();
			
			MySQL::Execute("UPDATE users SET us_pseudo='".$_GET['us_pseudo']."', us_pwd='".$_GET['us_pwd']."' WHERE us_id=".$_GET['us_id']);
			
		}

		private function select(){
			if (!isset($_GET['us_id']))
				Helper::ThrowAccessDenied();
			 MySQL::Execute('SELECT us_pseudo, us_pwd FROM users WHERE us_id='.$_GET['us_id']);
			return MySQL::GetResult()->fetchAll();
		}
		
		public function DoPost()
		{
			Helper::ThrowAccessDenied();
		}
		
		public function DoPut()
		{
			Helper::ThrowAccessDenied();
		}

		public function DoDelete()
		{
			Helper::ThrowAccessDenied(); 
		}
	}

	
?>