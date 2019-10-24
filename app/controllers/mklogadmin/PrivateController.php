<?php

namespace app\controllers\mklogadmin;

use EXception;

class PrivateController extends AppAdminControll
{

    public function __construct($route)
    {
        parent::__construct($route);

        if ($this->getAccess() !== true || $_SESSION['loggedIn'] !== true) {
            if (DEBUG) {
                header('Location: ' . PATH . '/mklogadmin');
                die;
            } else {
                header('Location: ' . PATH . '/mklogadmin');
                throw new Exception('Страница не найдена', 404);
                die;
            }
        }

    }

    public function indexAction()
    {
        if ($this->getAccess() === true && $_SESSION['loggedIn'] === true) {
            $this->getPrivateRoute();
        } else {
            header('Location: ' . PATH . '/mklogadmin');
            die;
        }

    }

    private function getPrivateRoute()
    {
        $this->view = 'indexadminaccess';
        $this->requestGetAndPostUri();

    }

    private function requestGetAndPostUri()
    {

        if (isset($_GET['application']) && $_GET['application'] == 'view') {
            $this->layout = false;
            $this->db->setTableSql('appformajax');
            $message = $this->db->findAll();
            $this->set(compact('message'));
            require_once APP . '/views/mklogadmin/private/message.php';
            die;
        }

        if (isset($_GET['application']) && $_GET['application'] == 'del') {
            $sql = 'DELETE FROM appformajax WHERE id = ?';
            $this->db->query($sql, [$_GET['id']]);
            $this->db->setTableSql('appformajax');
            $message = $this->db->findAll();
            $this->set(compact('message'));
            require_once APP . '/views/mklogadmin/private/message.php';
            die;
        }

    }

}
