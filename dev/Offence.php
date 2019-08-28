<?php
	class Offence{
        private $offence_id;
        private $category_id ; 

        public function getOffenceId($offence_id)
		{
			return $this->offence_id = $offence_id;
        }

        public function getOffenderName($offender_name)
		{
			return $this->offender_name = $offender_name;
        }

        public function getOffendePhone($offender_phone)
		{
			return $this->offender_phone = $offender_phone;
        }

        public function getPlateNumber($plate_number)
		{
			return $this->plate_number = $plate_number;
        }

        public function getCategoryId($category_id)
		{
			return $this->category_id = $category_id;
        }

        public function getVehicleType($vehicle_type)
		{
			return $this->vehicle_type = $vehicle_type;
        }

        public function getState($state)
		{
			return $this->state = $state;
        }

        public function getLocalGovt($local_govt)
		{
			return $this->local_govt = $local_govt;
        }

        public function getAddress($offender_name)
		{
			return $this->address = $address;
        }


        public function createOffence($category_id, $offender_name, $offender_phone, $plate_number, $vehicle_type, $state, $local_govt, $address)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO offences (category_id, offender_name, offender_phone, plate_number, vehicle_type, state, local_govt, address) VALUES 
            (:category_id, :offender_name, :offender_phone, :plate_number, :vehicle_type, :state, :local_govt, :address)");
			$query->bindValue(":category_id", $category_id);
            $query->bindValue(":offender_name", $offender_name);
            $query->bindValue(":offender_phone", $offender_phone);
            $query->bindValue(":plate_number", $plate_number);
            $query->bindValue(":vehicle_type", $vehicle_type);
            $query->bindValue(":state", $state);
            $query->bindValue(":local_govt", $local_govt);
			$query->bindValue(":address", $address);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function updateOffence($category_id, $offender_name, $offender_phone, $plate_number, $vehicle_type, $state, $local_govt, $address, $offence_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE offences SET category_id=:category_id, offender_name=:offender_name, offender_phone=:offender_phone, plate_number=:plate_number, 
            vehicle_type=:vehicle_type, state=:state, local_govt=:local_govt, address=:address WHERE offence_id=:offender_id)");
			$query->bindValue(":category_id", $category_id);
            $query->bindValue(":offender_name", $offender_name);
            $query->bindValue(":offender_phone", $offender_phone);
            $query->bindValue(":plate_number", $plate_number);
            $query->bindValue(":vehicle_type", $vehicle_type);
            $query->bindValue(":state", $state);
            $query->bindValue(":local_govt", $local_govt);
            $query->bindValue(":address", $address);
            $query->bindValue(":offence_id", $offence_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }


        public function deleteOffence($offence_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM offences WHERE offence_id=:offence_id");
			$query->bindValue(":offence_id", $offence_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllOffence()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM offences ORDER BY time_added DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleOffence($offence_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offences WHERE offence_id=:offence_id");
            $query->bindValue(":offence_id", $offence_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleOffenceList($offence_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offences WHERE offence_id=:offence_id");
            $query->bindValue(":offence_id", $offence_id);
			$query->execute();
			return $query->fetch();
        }
        
        public function getOffenderPhone($offender_phone)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offences WHERE offender_phone=:offender_phone");
            $query->bindValue(":offender_phone", $offender_phone);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function sumAllOffence()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT count(offence_id) as new_amount FROM offences");
			$query->execute();
			$lol= $query->fetch();
			return $now= $lol['new_amount'];
		}
        

        public function updateOffencePayment($offence_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE payments SET payment_status=1 WHERE offence_id=:offence_id)");
            $query->bindValue(":offence_id", $offence_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }


        public function getSingleOffencePayment($offence_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM payments WHERE offence_id=:offence_id");
            $query->bindValue(":offence_id", $offence_id);
			$query->execute();
			return $query->fetch();
		}

    }

?>