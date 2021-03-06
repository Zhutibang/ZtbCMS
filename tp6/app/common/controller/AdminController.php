<?php

namespace app\common\controller;


use app\admin\service\AdminConfigService;
use app\BaseController;
use think\App;
use think\facade\View;

/**
 * 管理后台基础控制器
 *  - 权限、登录校验
 *  但凡涉及到管理后台的，请务必集成此类
 * @package app\common\controller
 */
class AdminController extends BaseController
{
    /**
     * 无需登录的方法,同时也就不需要鉴权了
     * @var array
     */
    public $noNeedLogin = [];

    /**
     * 无需鉴权的方法,但需要登录
     * @var array
     */
    public $noNeedPermission = [];

    //引入中间件
    protected $middleware = [
        // 启用session
        \think\middleware\SessionInit::class,
        // 用户登录、权限验证
        \app\common\middleware\AdminAuth::class,
        // 操作日志记录
        \app\admin\middleware\OperationLog::class,
    ];

    public function __construct(App $app)
    {
        parent::__construct($app);
        // 往请求注入
        $app->request->noNeedLogin = $this->noNeedLogin ?? [];
        $app->request->noNeedPermission = $this->noNeedPermission ?? [];

        // 视图注入配置信息 $_Config
        $config = AdminConfigService::getInstance()->getConfig()['data'];
        View::assign('_Config', $config);
    }
}
