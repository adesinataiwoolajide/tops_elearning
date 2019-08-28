<?php
	class staffRegistration{
		public $db;

		function __construct($db){
			$this->db= $db;
		}
		public function userRegistration($full_name, $eemail, $password, $access){
			try{
				$insert = $this->db->prepare("INSERT INTO admin_login(full_name, user_name, password, access_level) VALUES(:full_name, :eemail, :password, :access)");
				$arr = array(':full_name'=>$full_name, ':eemail'=>$eemail, ':password'=>$password, ':access'=>$access);
				if($insert->execute($arr)){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		
		public function checkingUserExistence($users){
			try{
				$real = $this->db->prepare("SELECT * FROM admin_login WHERE user_name=:users");
				$att = array(':users'=>$users);
				$real->execute($att);
				if($real->rowCount() >0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}


		public function viewAllUsers(){
			try{
				$real = $this->db->prepare("SELECT * FROM admin_login ORDER BY time_registered");
				$real->execute();
				return $real->fetchAll(PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingUserDetails($user_name){
			try{
				$geting = $this->db->prepare("SELECT * FROM admin_login WHERE user_name =:user_name");
				$arr = array(':user_name'=>$user_name);
				$geting->execute($arr);
				$see = $geting->fetch();
				return $see;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		
		public function updateUserdetailsWithoutPic($user_id, $full_name, $eemail, $password, $access){
			try{
				$update = $this->db->prepare("UPDATE admin_login SET full_name=:full_name, user_name=:eemail, password=:password, access_level=:access WHERE user_id=:user_id");
				$arr = array(':full_name'=>$full_name, ':password'=>$password, ':eemail'=>$eemail, ':user_id'=>$user_id, ':access'=>$access);
				$result = $update->execute($arr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function updateUserThedetails($user_id, $full_name, $eemail, $access){
			try{
				$update = $this->db->prepare("UPDATE admin_login SET full_name=:full_name, user_name=:eemail, access_level=:access WHERE user_id=:user_id");
				$arr = array(':full_name'=>$full_name, ':eemail'=>$eemail, ':access'=>$access, ':user_id'=>$user_id);
				$result = $update->execute($arr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}


		public function updateUserdetailsID($user_id, $full_name, $access){
			try{
				$update = $this->db->prepare("UPDATE admin_login SET full_name=:full_name, access_level=:access WHERE user_id=:user_id");
				$arr = array(':full_name'=>$full_name, ':user_id'=>$user_id, ':access'=>$access);
				$result = $update->execute($arr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function updatePassword($email, $password){
			try{
				$select = $this->db->prepare("UPDATE admin_login SET password=:password WHERE user_name=:email");
				$arr = array(':password'=>$password, ':email'=>$email);
				if(!empty($select->execute($arr))){
					return true;
				}else{
					return false;
				}
				
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteAdminDetails($user_name){
			try{
				$delete = $this->db->prepare("DELETE FROM admin_login WHERE user_name=:user_name");
				$aro = array(':user_name'=>$user_name);
				if(!empty($delete->execute($aro))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function sumAllUser()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT count(user_id) as new_amount FROM admin_login");
			$query->execute();
			$lol= $query->fetch();
			return $now= $lol['new_amount'];
		}

		
		
	}
?>