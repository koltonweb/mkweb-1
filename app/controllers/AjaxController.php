<?php

namespace app\controllers;

use Exception;

class AjaxController extends AppController
{
    public function indexAction()
    {
        $this->layout = false;
        if (!empty($_POST) && !empty($_POST['nickname']) &&
            !empty($_POST['email']) && !empty($_POST['message'])) {
            try {
                $sql = "INSERT INTO appformajax SET `date` = CURDATE(),
                    name = ?,
                    mail = ?,
                    message = ?";
                $this->db->query($sql, [$_POST['nickname'], $_POST['email'], $_POST['message']]);
                $ajaxinfo = APP . '/views/Ajax/index.php';
                require_once $ajaxinfo;
                die;
            } catch (Exception $e) {
                $ajaxinfo = APP . '/views/Ajax/errormess.php';
                require_once $ajaxinfo;
                if (DEBUG) {
                    throw new Exception("Не удалось доставить сообщение {$e->getMessage()}", 500);
                    die;
                }
                die;
            }
        } else {
            header('Location: ' . PATH);
            die;
        }

    }

}
