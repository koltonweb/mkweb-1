<?php

namespace app\models;

use mkweb\TSingletone;

class AccessModel extends AppModel
{

    // Включает трейт синглтон
    use TSingletone;

    private $loggedin = [
        'username' => '',
        'password' => '',
    ];

    public function userIsLoggedIn()
    {

        $valid = $this->validFormData();

        if ($valid === true) {
            $username = $this->loggedin['username'];
            $password = $this->loggedin['password'];

            // Получают true тип если значения переменных совпадает с данными из БД, иначе false
            return $this->dataBaseAccess($username, $password);

        } elseif (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {

            return $this->getAccess($_SESSION['username'], $_SESSION['password']);

        } else {
            return false;
        }
    }

    private function validFormData()
    {
        if (isset($_POST['action']) && $_POST['action'] === 'login') {
            if (!isset($_POST['password']) || $_POST['password'] == '' ||
                !isset($_POST['username']) || $_POST['username'] == '') {
                $_SESSION['loggedIn'] = false;
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                $_SESSION['error_access'] = 'Все поля должны быть заполнены';
                return false;
            } else {
                $salt1 = '*&@{!=4df564.0';
                $salt2 = 'kD8(*B^&789$(';
                $pass = $_POST['password'];
                $this->loggedin['username'] = $_POST['username'];
                $this->loggedin['password'] = hash('ripemd128', hash('ripemd128', "$salt1$pass$salt2"));
                return true;
            }
        }

        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            $_SESSION = array();
            $this->loggedin = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params['path'], $params['domain'],
                    $params["secure"], $params["httponly"]);
            }
            $this->destroyTempAccessData();
            session_destroy();
            return false;
        }

        return false;
    }

    private function dataBaseAccess($username, $password)
    {

        $sql = 'SELECT * , INET_NTOA(user_ip) FROM mklogadmin WHERE
                username = ? AND password = ?';
        $s = $this->findBySql($sql, [$username, $password]);

        if (!empty($s) && $s[0]['username'] === $username &&
            $s[0]['password'] === $password &&
            $s[0]['INET_NTOA(user_ip)'] === $_SERVER['REMOTE_ADDR']) {
            $this->setTempAccessData();
            return true;
        } else {
            $_SESSION['loggedIn'] = false;
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            $_SESSION['error_access'] = 'Неверный логин или пароль';
            return false;
        }
    }

    private function setTempAccessData()
    {
        $str = 'sfg7f$%^&N&*(JcJNPzvdcaOPHUsd 456ga4564JI48OPvJPNnsdgmJKLNPJxdf';
        $pass = '';
        $clen = strlen($str) - 1;
        $random_num = mt_rand(10, 25);

        while (strlen($pass) < $random_num) {
            $pass .= $str[mt_rand(0, $clen)];
        }
        $salt1 = random_bytes(985);
        $salt2 = random_bytes(142);

        $pass = $salt1 . $pass . $salt2;

        $pass = hash('ripemd128', password_hash(crypt($pass, 'sdfgsd'), PASSWORD_DEFAULT));

        $_SESSION['username'] = $user_ip = $_SERVER['REMOTE_ADDR'];
        $_SESSION['password'] = $pass;
        $_SESSION['loggedIn'] = true;
        $sql = "UPDATE `mklogadmin` SET user_hash = ? WHERE user_ip = INET_ATON('$user_ip') AND id = 1";
        $this->query($sql, [$pass]);
    }

    private function getAccess($username, $password)
    {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $sql = "SELECT user_hash , INET_NTOA(user_ip) FROM mklogadmin WHERE
                user_ip = INET_ATON('$username') AND user_hash = ?";
            $s = $this->findBySql($sql, [$password]);

            if (!empty($s) && $s[0]['user_hash'] === $_SESSION['password'] &&
                $s[0]['INET_NTOA(user_ip)'] === $_SERVER['REMOTE_ADDR']) {
                return true;
            } else {
                $_SESSION['loggedIn'] = false;
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                return false;
            }
        }

        $_SESSION['loggedIn'] = false;
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        return false;
    }

    private function destroyTempAccessData()
    {
        $str = 'sfg7f$%^&N&*(JcJNPzvdca OPHUsd456B%^*&a4*(056448OPvJPNnsdgmJKLNPJxdf';
        $pass = '';
        $clen = strlen($str) - 1;
        $random_num = mt_rand(10, 25);

        while (strlen($pass) < $random_num) {
            $pass .= $str[mt_rand(0, $clen)];
        }
        $salt1 = random_bytes(985);
        $salt2 = random_bytes(142);

        $pass = $salt1 . $pass . $salt2;

        $pass = hash('ripemd128', password_hash(crypt($pass, '5D8sfNOPvd'), PASSWORD_DEFAULT));
        $sql = "UPDATE `mklogadmin` SET user_hash = ? WHERE id = 1";
        $this->query($sql, [$pass]);
    }

}
