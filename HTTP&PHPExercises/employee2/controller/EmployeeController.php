<?php

class EmployeeController extends Controller
{
    public function main()
    {
        $this->loadView('view/main.php');
    }

    public function viewAll()
    {
        $employeeModel = new EmployeesModel($this->db);
        $employees = $employeeModel->getAll();

        $this->loadView('view/show_employees.php', ['employees' => $employees]);
    }

    public function addProject()
    {
        $employeeId = isset($_GET['employee_id']) ? $_GET['employee_id'] : 0;

        try {
            if(!$this->isValidNumber($employeeId))
            {
                throw new Exception('Employee id should be a number!');
            }

            if(!$this->exists($employeeId))
            {
                throw new Exception('Employee does not exist!');
            }

            if (isset($_POST['project_name'], $_POST['description'], $_POST['start_date'], $_POST['end_date'])) {
                if (!$this->isValidWord($_POST['project_name'])) {
                    throw new Exception('Project name is not valid in format!');
                }

                if (!$this->isValidWord($_POST['description'])) {
                    throw new Exception('Project description is not valid in format!');
                }

                if (!$this->isValidDate($_POST['start_date'])) {
                    throw new Exception('Start date is not in valid format!');
                }

                if (!$this->isValidDate($_POST['end_date'])) {
                    throw new Exception('End date is not in valid format!');
                }

                $this->db->beginTransaction();

                $projectModel = new ProjectsModel($this->db,
                    $_POST['project_name'],
                    $_POST['description'],
                    $_POST['start_date'],
                    $_POST['end_date']);

                $projectModel->create();

                $projectId = $this->db->lastInsertId();

                $stm = $this->db->prepare('INSERT INTO employees_projects(employee_id, project_id) 
                                          VALUES(?, ?)');
                $stm->bindParam(1, $employeeId);
                $stm->bindParam(2, $projectId);

                $stm->execute();

                $this->db->commit();
            }

            $this->loadView('view/add_project.php', ['employee_id' => $employeeId]);
        }catch (Exception $exception)
        {
            $this->loadView('view/add_project.php', ['employee_id' => $employeeId]);
            echo $exception->getMessage();
        }
    }

    public function viewProjects()
    {
        $employeeId = isset($_GET['employee_id']) ? $_GET['employee_id'] : 0;

        try{
            if(!$this->exists($employeeId) || !$this->isValidNumber($employeeId))
            {
                throw new Exception('Employee does not exist!');
            }

            $employeeModel = new EmployeesModel($this->db);

            $projects = $employeeModel->getProjects($employeeId);

            $this->loadView('view/show_projects.php', ['projects' => $projects]);

        }catch (Exception $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function exists($employee_id)
    {
        return $this->db->query("SELECT first_name FROM employees WHERE employee_id = $employee_id")->rowCount() > 0;
    }
}