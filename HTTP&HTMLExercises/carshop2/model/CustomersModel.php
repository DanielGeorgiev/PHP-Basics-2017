<?php
class CustomersModel extends Model
{
	private $firstName;
	private $lastName;
	
	public function create()
	{
		// Insert into customers
		try{
            $stmt = $this->db->prepare("
              INSERT INTO customers
                (`first_name`, `last_name`)
              VALUES
                (?, ?)");

            $stmt->bindParam(1, $this->firstName);
            $stmt->bindParam(2, $this->lastName);

            $stmt->execute();

            return $this->db->lastInsertId();
        }
        catch (PDOException $e) {
            $this->db->rollBack();
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

	//Todo - problem 2
    // Read all customers

}