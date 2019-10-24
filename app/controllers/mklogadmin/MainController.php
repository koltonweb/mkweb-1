<?php

namespace app\controllers\mklogadmin;

class MainController extends AppAdminControll
{
    public function indexAction()
    {

        @$error_access = $_SESSION['error_access'];
        $this->set(compact('error_access') );   
        unset($_SESSION['error_access']);
        $this->layout = 'mklogform';
        $this->view = 'indexadminform';

        if (isset($_POST['action']) && $_POST['action'] === 'login') {
            if ($this->getAccess() === true && $_SESSION['loggedIn'] === true) {
                header('Location: ' . PATH . '/mklogadmin/private');
                die;
            } else {
                header('Location: ' . PATH . '/mklogadmin');
                die;
            }
        }
    }


}