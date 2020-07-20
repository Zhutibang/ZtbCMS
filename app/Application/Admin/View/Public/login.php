<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  百度统计 -->
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?123929b4d143a8384864a99fd4199190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <!--  百度统计 -->

    <style>
        html,body{
            height: 100%;
            width: 100%;
        }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f6f7ff;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
        }

        .main {
            box-sizing: border-box;
            padding: 50px 30px;
            width: 460px;
            height: 532px;
            background: #fff;
            box-shadow: 0px 12px 34px 0px rgba(0, 84, 202, 0.14);
            border-radius: 12px;
            margin: 5% auto;
        }

        .logo-box {
            margin-bottom: 50px;
        }

        .title {
            padding-bottom: 2px;
            font-weight: bold;
            font-size: 24px;
            color: #409eff;
            width: 100%;
            text-align: center;
        }

        .label {
            font-weight: bold;
            font-size: 14px;
            color: #333333;
            line-height: 1;
        }

        .input, .code-box {
            margin-bottom: 44px;
        }

        .input input {
            padding: 11px 0;
            width: 100%;
            border: 0;
            outline: 0;
            border-bottom: 1px solid #ededed;
        }

        ::-webkit-input-placeholder { /* WebKit browsers */
            color: #d8d8d8;
        }

        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            color: #d8d8d8;
        }

        ::-moz-placeholder { /* Mozilla Firefox 19+ */
            color: #d8d8d8;
        }

        :-ms-input-placeholder { /* Internet Explorer 10+ */
            color: #d8d8d8;
        }

        .code {
            margin-left: 16px;
        }

        .btn-box {
            margin-top: 50px;
        }

        button {
            width: 402px;
            height: 50px;
            font-size: 16px;
            color: #fff;
            border-radius: 25px;
            border: 0;
            outline: 0;
        }

        .default {
            background: #d4d4d4;
        }

        .finish {
            background: #409eff;
        }

        .footer {
            z-index: -1;
            position: absolute;
            bottom: 16px;
            color: #909399;
            font-size: 12px;
            text-align: center;
            left: 0;
            width: 100%;
        }

        .footer p {
            margin: 6px;
        }

        .footer a {
            color: #909399;
            text-decoration: none;
        }

        .footer p img {
            vertical-align: bottom;
            height: 20px;
        }
    </style>
    <admintemplate file="Admin/Common/Js"/>
</head>
<body>
<div class="main">
    <div class="logo-box flex-between">
        <div class="title">{$Config.sitename}</div>
    </div>
    <div class="label">账号</div>
    <div class="input">
        <input type="text" placeholder="请输入账号" id="username">
    </div>
    <div class="label">登录密码</div>
    <div class="input">
        <input type="password" placeholder="请输入密码" id="password">
        <input type="hidden" placeholder="key" id="__crypto_key__" value="{$__crypto_key__}">
    </div>
    <div class="label">验证码</div>
    <div class="input flex-between" style="margin-bottom: 0px">
        <input type="text" placeholder="请输入验证码" style="flex: 1;" id="code">
        <img id="code_img" class="code"
             src="{:U('Api/Checkcode/index','code_len=4&font_size=20&width=130&height=50&font_color=&background=')}"
             onclick="refreshs()"></a>
    </div>
    <p style="font-size: 12px;color: #7884a0;margin-top: 4px;">* 数据传输采用128位加密技术，保障您的信息安全</p>
    <div class="btn-box">
        <button class="default" onclick="doLogin()" disabled>登录</button>
    </div>
</div>
<div class="footer">
    <p>当前版本 v{:C('APPLIATION_VERSION')}</p>
    <p> 建议分辨率1366*768以上，推荐使用 </p>
    <p>
        Chrome浏览器 <img src="/statics/admin/pages/public/login/chrome.png" alt="">
        Firefox浏览器 <img src="/statics/admin/pages/public/login/firefox.png" alt="">
        360极速浏览器 <img src="/statics/admin/pages/public/login/360.png" alt="">
        IE11及以上浏览器 <img src="/statics/admin/pages/public/login/ie.png" alt=""></p>
</div>
<script>
    //若当前页面是再后台的内容页，则通知外层页面跳转
    if(parent !== window){
        parent.window.location = "{:U('Admin/Public/login')}"
    }

    var inputs = document.querySelectorAll('input');
    var len = inputs.length;
    var btn = document.querySelector('button');


    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', inputChange);
    }

    if (!!window.ActiveXObject || "ActiveXObject" in window){
        alert('建议使用IE11及以上的浏览器');
    }

    function inputChange() {
        var index = 0;

        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value.length > 0) {
                index++;
            }
        }

        if (index == len) {
            btn.classList.remove('default');
            btn.classList.add('finish');
            btn.disabled = false;
        } else {
            btn.classList.remove('finish');
            btn.classList.add('default');
            btn.disabled = true;
        }
    }

    //刷新二维码
    function refreshs() {
        document.getElementById('code_img').src = "{:U('Api/Checkcode/index','code_len=4&font_size=20&width=130&height=50&font_color=&background=&refresh=1')}&time=" + Math.random();
        void(0);
    }

    refreshs();

    function doLogin() {
        var username = $('input#username').val();
        var password = $('input#password').val();
        var code = $('input#code').val();
        var __crypto_key__ = $('input#__crypto_key__').val();
        var data = {
            username: username,
            password: password,
            code: code,
        }
        var plain_text = JSON.stringify(data);

        var encrypted_data = window.Ztbcms.AES.encrypt(plain_text, __crypto_key__)

        $.ajax({
            url: "{:U('Admin/Public/tologin')}",
            method: 'post',
            dataType: 'json',
            data: {
                form: encrypted_data
            },
            success: function (res) {
                if (!res.status) {
                    var msg = res.info
                    layer.msg(msg)
                } else {
                    var msg = res.info
                    layer.msg(msg)
                    setTimeout(function () {
                        window.location.replace(res.url)
                    }, 1500)
                }
            }
        })
    }
</script>
</body>
</html>