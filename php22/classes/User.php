<?php

class User
{
    private $email = "";
    private $password = "";
    private $errors = [];

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function get($email, $password)
    {
        $users = self::createUsers();
        $currentUser = new User($email, $password);
        foreach ($users as $user) {
            if ($user->getEmail() == $currentUser->getEmail()) {
                if ($user->getPassword() == $currentUser->getPassword()) {
                    return $user;
                } else {
                    return null;
                }
            }
        }
        return null;
    }

    public function login()
    {
        $_SESSION['email'] = $this->getEmail();
        header("Location: wochenkarte.php");
    }

    public static function logout()
    {
        session_destroy();
        header("Location: index.php");
    }

    public static function isLoggedId()
    {
        if (isset($_SESSION['email'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function validate()
    {
        return $this->validateEmail($this->email) & $this->validatePassword($this->password);
    }

    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($email) < 8) {
                $this->errors['email'] = "Email zu kurz!";
                return false;
            } elseif (strlen($email) > 30) {
                $this->errors['email'] = "Email zu lang!";
                return false;
            } else {
                return true;
            }
        } else {
            $this->errors['email'] = "Email not valid";
            return false;
        }
    }

    public function validatePassword($password)
    {
        if (strlen($password) < 4) {
            $this->errors['password'] = "Passwort zu kurz!";
            return false;
        } elseif (strlen($password) > 30) {
            $this->errors['password'] = "Passwort zu lang!";
            return false;
        } else {
            return true;
        }
    }

    public function hasError()
    {
        if(empty($this->getErrors())){
            return false;
        } else {
            return true;
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public static function createUsers()
    {
        $u1 = new User("tmelmer@tsn.at", "asdf");
        $u2 = new User("thpaulweber@tsn.at", "fdsa");
        $u3 = new User("martrieger@tsn.at", "1234");
        return [$u1, $u2, $u3];
    }
}

?>