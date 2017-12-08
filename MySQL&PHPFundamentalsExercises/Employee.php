<?php

class Employee
{
    private $firstName;
    private $middleName;
    private $lastName;
    private $department;
    private $position;
    private $passportId;
    private $country;

    // C
    public function __construct($firstName, $middleName, $lastName, $department = null, $position = null, $passportId = null, $country = null)
    {
        $this->setFirstName($firstName);
        $this->setMiddleName($middleName);
        $this->setLastName($lastName);
        $this->setDepartment($department);
        $this->setPosition($position);
        $this->setPassportId($passportId);
        $this->setCountry($country);
    }

    //G, S
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPassportId()
    {
        return $this->passportId;
    }

    public function setPassportId($passportId)
    {
        $this->passportId = $passportId;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    //Methods
    public function insertEmployee(PDO $db)
    {
        $stm = $db->prepare('INSERT INTO 
                      employees(first_name, middle_name, last_name, department, `position`, passport_id, native_country) 
                      VALUES(?, ?, ?, ?, ?, ?, ?)');

        $stm->execute(array($this->firstName,
            $this->middleName,
            $this->lastName,
            $this->department,
            $this->position,
            $this->passportId,
            $this->getCountryCode($db, $this->country)));
    }

    public function getIds(PDO $db)
    {
        $stm = $db->prepare('SELECT employee_id FROM employees 
                          WHERE first_name = ? AND middle_name = ? AND last_name = ?');

        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute(array($this->firstName, $this->middleName, $this->lastName));

        $ids = [];

        foreach ($stm as $item) {
            $ids[] = $item['employee_id'];
        }

        return $ids;
    }

    public function exists(PDO $db, $id)
    {
        $stm = $db->prepare("SELECT * FROM employees WHERE employee_id = ? 
                                  AND first_name = ? AND middle_name = ? AND last_name = ?");

        $stm->bindParam(1, $id);
        $stm->bindParam(2, $this->firstName);
        $stm->bindParam(3, $this->middleName);
        $stm->bindParam(4, $this->lastName);


        $stm->execute();

        return $stm->rowCount() > 0;
    }

    public function insertEmail(PDO $db, $emailName, $emailType, $employeeId)
    {
        $stm = $db->prepare('INSERT INTO employee_emails(email_name, email_type, employee_id) VALUES(?, ?, ?)');

        $stm->bindParam(1, $emailName);
        $stm->bindParam(2, $emailType);
        $stm->bindParam(3, $employeeId);

        $stm->execute();
    }

    public function insertPhone(PDO $db, $phoneNumber, $phoneType, $employeeId)
    {
        $stm = $db->prepare('INSERT INTO employee_phones(phone_number, phone_type, employee_id) VALUES(?, ?, ?)');

        $stm->bindParam(1, $phoneNumber);
        $stm->bindParam(2, $phoneType);
        $stm->bindParam(3, $employeeId);

        $stm->execute();
    }

    public function getInfo(PDO $db)
    {
        $stm = $db->prepare('SELECT employee_id, first_name, middle_name, last_name, department, `position`, passport_id, GROUP_CONCAT(email_name) AS emails
                              FROM employees
                              INNER JOIN employee_emails USING(employee_id)
                              WHERE first_name = ? AND last_name = ?
                              GROUP BY employee_id');

        $stm->bindParam(1, $this->firstName);
        $stm->bindParam(2, $this->lastName);

        $stm->setFetchMode(PDO::FETCH_ASSOC);

        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountryCode(PDO $db, $country)
    {
        $stm = $db->prepare('SELECT country_code FROM countries WHERE country_name = ?');
        $stm->bindParam(1, $country);

        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();

        return $stm->rowCount() > 0 ? $stm->fetchAll(PDO::FETCH_ASSOC)[0]['country_code'] : null;
    }


    /*
     * //TODO:
     * SELECT * FROM employees WHERE first_name LIKE 'Prag%' OR last_name LIKE 'Kish%'
     */
}