<?php

class ProjectsModel extends Model
{
    private $name;

    private $description;

    private $start_date;

    private $end_date;


    public function __construct(PDO $db, string $name,
                                string $description,
                                string $start_date,
                                string $end_date)
    {
        parent::__construct($db);
        $this->table = 'projects';

        $this->name = $name;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function create()
    {
        $stm = $this->db->prepare('INSERT INTO projects(name, description, start_date, end_date) 
            VALUES(?, ?, ?, ?)');

        $stm->bindParam(1, $this->name);
        $stm->bindParam(2, $this->description);
        $stm->bindParam(3, $this->start_date);
        $stm->bindParam(4, $this->end_date);

        $stm->execute();
    }
}