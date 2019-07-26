<?php

return array(
    array(
        //父菜单ID，NULL或者不写系统默认，0为顶级菜单
        "parentid" => 0,
        //地址，[模块/]控制器/方法
        "route" => "Elementui/Index/index",
        //类型，1：权限认证+菜单，0：只作为菜单
        "type" => 1,
        //状态，1是显示，0不显示（需要参数的，建议不显示，例如编辑,删除等操作）
        "status" => 1,
        //名称
        "name" => "Element UI",
        //备注
        "remark" => "",
        //子菜单列表
        "child" => array(
            array(
                "route" => "Elementui/RouterDemo/openNewIframe",
                "type" => 1,
                "status" => 1,
                "name" => "打开新页面",
            ),
            array(
                "route" => "Elementui/UploadDemo/uploadFile",
                "type" => 1,
                "status" => 1,
                "name" => "图片上传",
            ),
            array(
                "route" => "Elementui/UploadDemo/uploadImage",
                "type" => 1,
                "status" => 1,
                "name" => "文件上传",
            ),
            array(
                "route" => "Elementui/Element/common_table",
                "type" => 1,
                "status" => 1,
                "name" => "列表页",
            ),
        ),
    ),
);