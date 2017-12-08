<?php
class Carshop
{
    private $db = false;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function main()
    {
        do{
            $input_str = trim(fgets(STDIN));
            $tokens = explode(', ', $input_str);

            if(count($tokens)  == 6){
                $car = [
                    'make' => $tokens[0],
                    'model'=> $tokens[1],
                    'year' => $tokens[2],
                ];

                $person = [
                    'firstName' =>  $tokens[3],
                    'lastName' => $tokens[4]
                ];

                $price = explode(' ', $tokens[5])[1];

                $this->setSale($car, $person, $price);
            }else if ($input_str == 'Sales')
            {
                $sales = $this->getAllSales();
                $sum = 0;

                foreach ($sales as $sale) {
                    echo $sale['make'] . ', ' . $sale['model'] . ', ' . $sale['date'] . PHP_EOL;
                    echo 'Sold to ' . $sale['full_name'] . ' for BGN '  . $sale['price'] . PHP_EOL;
                    echo '---' . PHP_EOL;
                    $sum += $sale['price'];
                }

                echo '----------' . PHP_EOL;
                echo $sum . PHP_EOL;
            }
        }
        while($input_str != "Bye");
    }

    protected function setSale($car, $person, $price)
    {
        try {
            $this->db->beginTransaction();

            $stm = $this->db->prepare('INSERT INTO cars(make, model, production_year) VALUES(?, ?, ?)');
            $stm->bindParam(1, $car['make']);
            $stm->bindParam(2, $car['model']);
            $stm->bindParam(3, $car['year']);
            $stm->execute();

            $carId = $this->db->lastInsertId();

            $stm = $this->db->prepare('INSERT INTO customers(first_name, last_name) VALUES(?, ?)');
            $stm->bindParam(1, $person['firstName']);
            $stm->bindParam(2, $person['lastName']);
            $stm->execute();

            $customerId = $this->db->lastInsertId();

            $stm = $this->db->prepare('INSERT INTO sales(car_id, customer_id, price) VALUES(?, ?, ?)');
            $stm->bindParam(1, $carId);
            $stm->bindParam(2, $customerId);
            $stm->bindParam(3, $price);
            $stm->execute();

            $this->db->commit();
            echo 'New sale entered ' . date('Y-m-d H:i') . PHP_EOL;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . PHP_EOL;
        }
    }

    protected function getAllSales()
    {
        return $this->db->query('CALL GetAllSales()', PDO::FETCH_ASSOC);
    }
}
