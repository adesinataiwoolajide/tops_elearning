<?php
	class Category{
        private $category_name;
        private $category_id ; 

        public function getcategory($category_name)
		{
			return $this->category_name = $category_name;
        }

        public function getcategoryId($category_id)
		{
			return $this->category_id = $category_id;
        }
        
        public function checkIfAlreadyAdded($category_name)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM offence_category WHERE category_name = :category_name");
			$query->bindValue(":category_name", $category_name);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}

		public function createCategory($category_name, $price)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO offence_category (category_name, price) VALUES (:category_name, :price)");
			$query->bindValue(":category_name", $category_name);
			$query->bindValue(":price", $price);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }
        
        public function updateCategory($category_name, $price, $category_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE offence_category SET category_name=:category_name, price=:price WHERE category_id=:category_id");
			$query->bindValue(":category_name", $category_name);
			$query->bindValue(":price", $price);
			$query->bindValue(":category_id", $category_id);
			
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }
        
        public function deleteCategory($category_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM offence_category WHERE category_id=:category_id");
			$query->bindValue(":category_id", $category_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllCategory()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM offence_category ORDER BY category_name ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleCategory($category_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offence_category WHERE category_id=:category_id");
            $query->bindValue(":category_id", $category_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleCategoryList($category_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offence_category WHERE category_id=:category_id");
            $query->bindValue(":category_id", $category_id);
			$query->execute();
			return $query->fetch();
		}

		public function getSingleCategoryName($category_name)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offence_category WHERE category_name=:category_name");
            $query->bindValue(":category_name", $category_name);
			$query->execute();
			return $query->fetch();
		}

		public function sumAllCategory()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT count(category_id) as new_amount FROM offence_category");
			$query->execute();
			$lol= $query->fetch();
			return $now= $lol['new_amount'];
		}

		public function calculateSum($category_name)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM offence_category WHERE category_name=:category_name");
            $query->bindValue(":category_name", $category_name);
			$query->execute();
			return $query->fetch();
		}
    }

?>