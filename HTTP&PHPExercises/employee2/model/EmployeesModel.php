<?php

class EmployeesModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = 'employees';
    }

    public function getAll()
    {
        return $this->db->query("SELECT employee_id, 
              first_name, 
              last_name, 
              job_title, 
              name AS department_name
              FROM $this->table 
              INNER JOIN departments USING(department_id)",
            PDO::FETCH_ASSOC);
    }

    public function getProjects($employee_id)
    {
        return $this->db->query("SELECT name, description, start_date, end_date 
                                FROM employees_projects 
                                INNER JOIN projects USING (project_id)
                                WHERE employee_id = $employee_id",
            PDO::FETCH_ASSOC);
    }
}