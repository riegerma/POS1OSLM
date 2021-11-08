<?php

class GradeEntry
{

    private $name = '';
    private $email = '';
    private $examDate = '';
    private $subject = '';
    private $grade = '';

    private $errors = [];

    public function __construct()
    {

    }

    public static function getAll()
    {
        $grades = [];
        if (isset($_SESSION['grades'])) {
            foreach ($_SESSION['grades'] as $g) {
                $grades[] = unserialize($g);
            }
        }
        return $grades;
    }

    public static function deleteAll()
    {
        if (isset($_SESSION['grades'])) {
            unset($_SESSION['grades']);
        }
    }

    public function save()
    {
        if ($this->validate()) {
            $s = serialize($this);
            $_SESSION['grades'][] = $s; //['grades][] = $s hängt $s an Array dran
            return true;
        }
        return false;
    }


    public function validate()
    {
        return $this->validateName($this->name) & $this->validateEmail($this->email) & $this->validateExamDate($this->examDate) &
            $this->validateGrade($this->grade) & $this->validateSubject($this->subject);
    }

    private function validateName()
    {
        if (strlen($this->name) == 0) {
            $this->errors['name'] = "Name darf nicht leer sein!";
            return false;
        } else if (strlen($this->name) > 20) {
            $this->errors['name'] = "Name zu lang!";
            return false;
        } else {
            return true;
        }
    }

    private function validateExamDate()
    {
        try {
            if ($this->examDate == "") {
                $this->errors['examDate'] = "Prüfungsdatum darf nicht leer sein!";
                return false;
            } else if (new DateTime($this->examDate) > new DateTime()) {
                $this->errors['examDate'] = "Prüfungsdatum liegt in der Zukunft!";
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            $this->errors['examDate'] = "Prüfungsdatum ungültig!";
            return false;
        }
    }

    private function validateSubject()
    {
        if ($this->subject != 'd' && $this->subject != 'e' && $this->subject != 'm') {
            $this->errors['subject'] = "Fach ungültig!";
            return false;
        } else {
            return true;
        }
    }

    private function validateGrade()
    {
        if (!is_numeric($this->grade) || $this->grade < 1 || $this->grade > 5) {
            $this->errors['grade'] = "Note ungültig!";
            return false;
        } else {
            return true;
        }
    }

    private function validateEmail()
    {
        if ($this->email != "" && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "E-Mail ungültig";
            return false;
        } else {
            return true;
        }
    }

    public function getExamDateFormatted()
    {
        return date_format(date_create($this->examDate), "d.m.Y");
    }

    public function getSubjectFormatted()
    {
        switch ($this->subject) {
            case 'm':
                return 'Mathematik';
            case 'd':
                return 'Deutsch';
            case 'e':
                return 'Englisch';
            default:
                return null;
        }
    }

    public function hasError($field)
    {
        return isset($this->errors[$field]);
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getExamDate()
    {
        return $this->examDate;
    }

    /**
     * @param string $examDate
     */
    public function setExamDate($examDate)
    {
        $this->examDate = $examDate;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }


}