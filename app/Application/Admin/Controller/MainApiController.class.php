<?php
/**
 * User: jayinton
 * Date: 2019/3/2
 * Time: 14:37
 */

namespace Admin\Controller;


use Common\Controller\AdminBase;
use Libs\Helper\MysqlHelper;

class MainApiController extends AdminBase
{
    protected $noNeedPermission = ['getDashboardInfo'];
    /**
     * 系统信息
     * @return array
     */
    private function _getSystemInfo()
    {
        $system_info = [
            [
                'name' => '操作系统',
                'value' => PHP_OS,
            ],
            [
                'name' => '运行环境',
                'value' => $_SERVER["SERVER_SOFTWARE"],
            ],
            [
                'name' => 'PHP运行方式',
                'value' => php_sapi_name(),
            ],
            [
                'name' => 'MySQL版本',
                'value' => MysqlHelper::getVersion(),
            ],
            [
                'name' => '数据库名字',
                'value' => C('DB_NAME'),
            ],
            [
                'name' => '数据库地址',
                'value' => C('DB_HOST'),
            ],
            [
                'name' => '产品名称',
                'value' => CMS_APPNAME,
            ],
            [
                'name' => '内核版本',
                'value' => CMS_VERSION,
            ],
            [
                'name' => '内核流水号',
                'value' => CMS_BUILD,
            ],
            [
                'name' => '产品版本',
                'value' => C('APPLIATION_VERSION'),
            ],
            [
                'name' => '上传附件限制',
                'value' => ini_get('upload_max_filesize'),
            ],
            [
                'name' => '执行时间限制',
                'value' => ini_get('max_execution_time') . "秒",
            ],
            [
                'name' => '剩余空间',
                'value' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            ],
        ];
        return $system_info;
    }

    /**
     * 后台统计信息
     * @return array
     */
    private function _getAdminStatisticsInfo()
    {
        $limit_time = time() - 7 * 24 * 60 * 60;//7日内

        //后台用户数
        $admin_user_amount = M('user')->count();

        //登录成功率
        $login_success_amount = M('loginlog')->where([
            'logintime' => ['EGT', $limit_time],
            'status' => ['EQ', 1],
        ])->count();

        $login_total = M('loginlog')->where([
            'logintime' => ['EGT', $limit_time],
        ])->count();

        if ($login_total == 0) {
            $login_success_percent = 100 . '%';
        } else {
            $login_success_percent = round($login_success_amount / $login_total * 100, 1) . '%';
        }

        //操作成功率
        $success_amount = M('operationlog')->where([
            'time' => ['EGT', $limit_time],
            'status' => ['EQ', 1],
        ])->count();

        $total = M('operationlog')->where([
            'time' => ['EGT', $limit_time],
        ])->count();

        if ($total == 0) {
            $operate_success_percent = 100 . '%';
        } else {
            $operate_success_percent = round($success_amount / $total * 100, 1) . '%';
        }

        $info = [
            'admin_user_amount' => $admin_user_amount,
            'login_success_percent' => $login_success_percent,
            'operate_success_percent' => $operate_success_percent,
        ];

        return $info;
    }

    /**
     * 获取警报信息
     */
    function _getAlertMessage()
    {
        $msg = [];

        if (file_exists(APP_PATH . 'Install')) {
            $msg [] = [
                'type' => 'warning', //success,info,warning,error
                'msg' => '您还没有删除 Install 模块，出于安全的考虑，我们建议您删除 Install 模块(/app/Application/Install)'
            ];
        }

        return $msg;
    }

    function getDashboardInfo()
    {
        //服务器信息
        $return_data = [
            'system_info' => $this->_getSystemInfo(),
            'admin_statistics_info' => $this->_getAdminStatisticsInfo(),
            'alert_message' => $this->_getAlertMessage(),
        ];

        $this->ajaxReturn($this->createReturn(true, $return_data));
    }
}