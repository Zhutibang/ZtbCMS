<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>安装向导</title>
    <link rel="stylesheet" href="/statics/modules/install/css/install.css"/>
    <script src="/statics/modules/install/js/jquery.js"></script>
    <script src="/statics/modules/install/js/validate.js"></script>
    <script src="/statics/modules/install/js/ajaxForm.js"></script>
</head>
<body>
<div class="wrap">
    {include file="index/header" /}
    <section class="section">
        <div class="step">
            <ul>
                <li class="on"><em>1</em>检测环境</li>
                <li class="current"><em>2</em>创建数据</li>
                <li><em>3</em>完成安装</li>
            </ul>
        </div>
        <form id="J_install_form" action="{:api_url('/install/index/step4')}" method="post">
            <input type="hidden" name="force" value="0"/>
            <div class="server">
                <table width="100%">
                    <tr>
                        <td class="td1" width="100">数据库信息</td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="tar">数据库服务器：</td>
                        <td><input type="text" name="db_host" id="dbhost" value="127.0.0.1" class="input"></td>
                        <td>
                            <div id="J_install_tip_dbhost"><span class="gray">数据库服务器地址，一般为127.0.0.1</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">数据库端口：</td>
                        <td><input type="text" name="db_port" id="dbport" value="3306" class="input"></td>
                        <td>
                            <div id="J_install_tip_dbport"><span class="gray">数据库服务器端口，一般为3306</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">数据库用户名：</td>
                        <td><input type="text" name="db_user" id="dbuser" value="root" class="input"></td>
                        <td>
                            <div id="J_install_tip_dbuser"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">数据库密码：</td>
                        <td><input type="text" name="db_pwd" id="dbpw" value="" class="input" autoComplete="off" onblur="TestDbPwd()"></td>
                        <td>
                            <div id="J_install_tip_dbpw"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">数据库名：</td>
                        <td><input type="text" name="db_name" id="dbname" value="ztbcms" class="input"></td>
                        <td>
                            <div id="J_install_tip_dbname">请预先创建数据库</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">数据库表前缀：</td>
                        <td><input type="text" name="db_prefix" id="dbprefix" value="ztb_" class="input"></td>
                        <td>
                            <div id="J_install_tip_dbprefix"><span class="gray">建议使用默认，同一数据库安装多个ZTBCMS时需修改</span></div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td class="td1" width="100">网站配置</td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="tar">网站名称：</td>
                        <td><input type="text" name="sitename" value="ZTBCMS内容管理系统" class="input"></td>
                        <td>
                            <div id="J_install_tip_sitename"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">网站域名：</td>
                        <td><input type="text" name="siteurl" value="/" id="siteurl" class="input" autoComplete="off"></td>
                        <td>
                            <div id="J_install_tip_siteurl"><span class="gray">请以“/”结尾</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">关键词：</td>
                        <td><input type="text" name="sitekeywords" value="ZTBCMS内容管理系统" class="input" autoComplete="off"></td>
                        <td>
                            <div id="J_install_tip_sitekeywords"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">描述：</td>
                        <td><input type="text" name="siteinfo" class="input" value="ZTBCMS网站管理系统,是一款完全开源免费的PHP+MYSQL系统.核心采用了Thinkphp框架等众多开源软件,同时核心功能也作为开源软件发布"></td>
                        <td>
                            <div id="J_install_tip_siteinfo"></div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td class="td1" width="100">创始人信息</td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="tar">管理员帐号：</td>
                        <td><input type="text" name="manager" value="admin" class="input"></td>
                        <td>
                            <div id="J_install_tip_manager"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">密码：</td>
                        <td><input type="text" name="manager_pwd" id="J_manager_pwd" class="input" autoComplete="off"></td>
                        <td>
                            <div id="J_install_tip_manager_pwd"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">重复密码：</td>
                        <td><input type="text" name="manager_ckpwd" class="input" autoComplete="off"></td>
                        <td>
                            <div id="J_install_tip_manager_ckpwd"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">Email：</td>
                        <td><input type="text" name="manager_email" class="input" value=""></td>
                        <td>
                            <div id="J_install_tip_manager_email"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tar">测试数据：</td>
                        <td><input name="testdata" type="checkbox" value="1" alt="测试数据需要安装在根目录下才可以完整体验" title="测试数据需要安装在根目录下才可以完整体验"/><span class="gray">默认测试数据，了解ZTBCMS！</span></td>
                        <td>
                            <div id="J_install_tip_manager_email"></div>
                        </td>
                    </tr>
                </table>
                <div id="J_response_tips" style="display:none;"></div>
            </div>
            <div class="bottom tac"><a href="{:api_url('/install/index/step2')}" class="btn">上一步</a>
                <button type="submit" class="btn btn_submit J_install_btn">创建数据</button>
            </div>
        </form>
    </section>
    <div style="width:0;height:0;overflow:hidden;"><img src="/statics/modules/install/images/install/pop_loading.gif"></div>
    <script>
        function TestDbPwd() {

            var db_host = $('#dbhost').val();
            var db_user = $('#dbuser').val();
            var db_pwd = $('#dbpw').val();
            var db_name = $('#dbname').val();
            var db_port = $('#dbport').val();
            var data = {'db_host': db_host, 'db_user': db_user, 'db_pwd': db_pwd, 'db_name': db_name, 'db_port': db_port};
            var url = "{:api_url('/install/index/testdbpwd')}";
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (res) {
                    if (res.status) {
                        $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_success" style="">数据库链接成功</span>');
                    } else {
                        $('#dbpw').val("");
                        $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">' + res.msg + '</span>');
                    }
                }
            });
        }

        $(function () {

            //聚焦时默认提示
            var focus_tips = {
                db_host: '数据库服务器地址，一般为127.0.0.1',
                db_port: '数据库服务器端口，一般为3306',
                db_user: '',
                db_pwd: '',
                db_name: '',
                db_prefix: '建议使用默认，同一数据库安装多个时需修改',
                manager: '创始人帐号，拥有站点后台所有管理权限',
                manager_pwd: '',
                manager_ckpwd: '',
                sitename: '',
                siteurl: '请以“/”结尾',
                sitekeywords: '',
                siteinfo: '',
                manager_email: ''
            };


            var install_form = $("#J_install_form"),
                reg_username = $('#J_reg_username'),						//用户名表单
                reg_password = $('#J_reg_password'),						//密码表单
                reg_tip_password = $('#J_reg_tip_password'),		//密码提示区
                response_tips = $('#J_response_tips');				//后端返回提示

            //validate插件修改了remote ajax验证返回的response处理方式；增加密码强度提示 passwordRank
            install_form.validate({
                //debug : true,
                //onsubmit : false,
                errorPlacement: function (error, element) {
                    //错误提示容器
                    $('#J_install_tip_' + element[0].name).html(error);
                },
                errorElement: 'span',
                //invalidHandler : , 未验证通过 回调
                //ignore : '.ignore' 忽略验证
                //onkeyup : true,
                errorClass: 'tips_error',
                validClass: 'tips_error',
                onkeyup: false,
                focusInvalid: false,
                rules: {
                    db_host: {
                        required: true
                    },
                    db_port: {
                        required: true
                    },
                    db_user: {
                        required: true
                    },
                    db_pwd: {
                        required: true
                    },
                    db_name: {
                        required: true
                    },
                    db_prefix: {
                        required: true
                    },
                    manager: {
                        required: true
                    },
                    manager_pwd: {
                        required: true
                    },
                    manager_ckpwd: {
                        required: true,
                        equalTo: '#J_manager_pwd'
                    },
                    manager_email: {
                        required: true,
                        email: true
                    }
                },
                highlight: false,
                unhighlight: function (element, errorClass, validClass) {
                    var tip_elem = $('#J_install_tip_' + element.name);

                    tip_elem.html('<span class="' + validClass + '" data-text="text"><span>');

                },
                onfocusin: function (element) {
                    var name = element.name;
                    $('#J_install_tip_' + name).html('<span data-text="text">' + focus_tips[name] + '</span>');
                    $(element).parents('tr').addClass('current');
                },
                onfocusout: function (element) {
                    var _this = this;
                    $(element).parents('tr').removeClass('current');

                    if (element.name === 'email') {
                        //邮箱匹配点击后，延时处理
                        setTimeout(function () {
                            _this.element(element);
                        }, 150);
                    } else {

                        _this.element(element);

                    }

                },
                messages: {
                    db_host: {
                        required: '数据库服务器地址不能为空'
                    },
                    db_port: {
                        required: '数据库服务器端口不能为空'
                    },
                    db_user: {
                        required: '数据库用户名不能为空'
                    },
                    db_pwd: {
                        required: '数据库密码不能为空'
                    },
                    db_name: {
                        required: '数据库名不能为空'
                    },
                    db_prefix: {
                        required: '数据库表前缀不能为空'
                    },
                    manager: {
                        required: '管理员帐号不能为空'
                    },
                    manager_pwd: {
                        required: '密码不能为空'
                    },
                    manager_ckpwd: {
                        required: '重复密码不能为空',
                        equalTo: '两次输入的密码不一致。请重新输入'
                    },
                    manager_email: {
                        required: 'Email不能为空',
                        email: '请输入正确的电子邮箱地址'
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                    return true;
                }
            });


            var _data = {};
        });
    </script>
</div>
{include file="index/footer" /}
</body>
</html>
