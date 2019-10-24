<?php

namespace app\controllers;

use mkweb\App;

class MainController extends AppController
{

    public function indexAction()
    {
        $this->db->setTableSql('metatags');
        $meta_arr = $this->db->findAll();
        $meta_desc = $meta_arr[0]['metadescr'];
        $meta_keywords = $meta_arr[0]['metakeywords'];
        $this->setMeta(App::$app->getProperty('mkweb_name'), "$meta_desc", "$meta_keywords");
        $this->set(compact('meta_arr'));


    }

}
