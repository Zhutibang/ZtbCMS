<?php

return array(
    array(
        //父菜单ID，NULL或者不写系统默认，0为顶级菜单
        "parentid" => 0,
        //地址，[模块/]控制器/方法
        "route" => "AdminMessage/Index/%",
        //类型，1：权限认证+菜单，0：只作为菜单
        "type" => 0,
        //状态，1是显示，0不显示（需要参数的，建议不显示，例如编辑,删除等操作）
        "status" => 1,
        //名称
        "name" => "后台消息管理",
        //备注
        "remark" => "后台消息管理",
        //子菜单列表
        "child" => array(
            array(
                "route" => "AdminMessage/Index/index",
                "type" => 1,
                "status" => 1,
                "name" => "所有通知",
            ),
            array(
                "route" => "AdminMessage/Index/noRead",
                "type" => 1,
                "status" => 1,
                "name" => "未读通知",
            ),
            array(
                "route" => "AdminMessage/Index/system",
                "type" => 1,
                "status" => 1,
                "name" => "系统通知",
            ),
            array(
                "route" => "AdminMessage/Index/getAdminMsgList",
                "type" => 1,
                "status" => 0,
                "name" => "获取通知列表",
            ),
            array(
                "route" => "AdminMessage/Index/readMsg",
                "type" => 1,
                "status" => 0,
                "name" => "阅读通知",
            ),
            array(
                "route" => "AdminMessage/Index/readMsgAll",
                "type" => 1,
                "status" => 0,
                "name" => "阅读全部通知",
            )
        )
    )
);