<?php

namespace app\controllers\mklogadmin;


use app\controllers\AppController;
use app\models\AccessModel;

class AppAdminControll extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->db = AccessModel::instance();
        $this->layout = 'mklogform';    
    }

    protected function getAccess()
    {   
        return $this->db->userIsLoggedIn();
    }
}