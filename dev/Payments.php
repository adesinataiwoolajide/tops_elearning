<?php
	class Payments{
        private $offence_id;
        private $payment_id ; 

        private $total_amount;
        
        public function getOffenceId($offence_id)
		{
			return $this->offence_id = $offence_id;
        }

        public function getPaymentId($payment_id)
		{
			return $this->payment_id = $payment_id;
        }

        public function getTotalAmount($total_amount)
		{
			return $this->total_amount = $total_amount;
        }

        


        public function createPayment($offence_id, $total_amount, $status, $transaction_id, $paystack_refrence)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO payments (offence_id, total_amount, status, transaction_id, paystack_refrence) VALUES 
            (:offence_id, :total_amount, :status, :transaction_id, :paystack_refrence)");
			$query->bindValue(":offence_id", $offence_id);
            $query->bindValue(":total_amount", $total_amount);
            $query->bindValue(":status", $status);
            $query->bindValue(":transaction_id", $transaction_id);
            $query->bindValue(":paystack_refrence", $paystack_refrence);
           
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function updatePayment($transaction_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE payments SET status=1 WHERE transaction_id=:transaction_id)");
            $query->bindValue(":transaction_id", $transaction_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
		}
		
		public function sumAllPayments()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT sum(total_amount) as new_amount FROM payments");
			$query->execute();
			$lol= $query->fetch();
			return $now= $lol['new_amount'];
		}


        public function deletePayment($transaction_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM payments WHERE transaction_id=:transaction_id");
			$query->bindValue(":transaction_id", $transaction_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllPayment()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM payments ORDER BY time_added DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleOffence($payment_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM payments WHERE payment_id=:payment_id");
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

    }

?>