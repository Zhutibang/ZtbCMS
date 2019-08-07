<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Testing\Controller;

use Common\Controller\AdminBase;

class TestController extends AdminBase {

    protected function _initialize() {
        parent::_initialize();

        //有且只有超级管理员才能执行
        if($this->userInfo['role_id'] != 1){
            echo 'No permission';
            exit();
        }

    }
}