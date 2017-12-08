<?php
class SalesModel extends Model{

	private $price;
	private $carId;
	private $customerId;
	
	public function create()
	{
        // Insert into sales
		try{
            $stmt = $this->db->prepare("
                INSERT INTO `sales`
                  (price, car_id, customer_id`)
                VALUES 
                   (?, ?, ?)");

            $stmt->bindParam(1, $this->price);
            $stmt->bindParam(2, $this->carId);
            $stmt->bindParam(3, $this->customerId);

            $stmt->execute();

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
	}
	// Todo - problem 1
    // Modifications to create()
	
	public function readAll()
	{
        try {
            $stmt = $this->db->prepare('
              SELECT make, model, production_year, price       
                FROM sales 
                INNER JOIN cars USING (car_id)');

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
		    echo "Error!: " . $e->getMessage() . "<br/>";
        }
	}
	
	public function readTotal()
	{
        $stmt = $this->db->prepare("
            SELECT SUM(`price`) as `total_amount`
              FROM `sales`");
        $stmt->execute();


        if($stmt->fetch(PDO::FETCH_ASSOC)['total_amount'])
			return $stmt->fetch(PDO::FETCH_ASSOC)['total_amount'];
		else
			return false;
	}
}