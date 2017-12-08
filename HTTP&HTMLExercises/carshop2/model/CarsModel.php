<?php
class CarsModel extends Model
{
	
	private $make;
	private $model;
	private $year;
	
	public function create(){
		try {
            $stmt = $this->db->prepare("
              INSERT INTO cars
                (`make`, `model`, `year`)
              VALUES
                (?, ?, ?)");

            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);

            $stmt->execute();

            return $this->db->lastInsertId();
		 }
		 catch (PDOException $e) {
            $this->db->rollBack();
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

    // Todo - problem 6
    // Method/s to search for a car and owner. Use join

}