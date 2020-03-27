<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <block name="title">
        <title>系统后台</title>
    </block>

    <block name="header-main">

        <!-- ztbcms 默认 iconfont -->
        <link rel="stylesheet" href="{$config_siteurl}statics/css/iconfont/iconfont.css">

        <!-- jQuery 2.x -->
        <script src="{$config_siteurl}statics/admin/theme/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- layer.js -->
        <script src="{$config_siteurl}statics/admin/layer/layer.js"></script>

        <!--  ztbcms工具类(必须在vue-commonn 前加载)  -->
        <script src="{$config_siteurl}statics/js/ztbcms/ztbcms.js"></script>

        <!-- vue.js -->
        <script src="{$config_siteurl}statics/js/vue/vue.js"></script>
        <script src="{$config_siteurl}statics/js/vue/vue-common.js"></script>
        <script>
            (function (vue) {
                //引入vue mixin
                vue.mixin(window.__vueCommon);
            })(window.Vue);
        </script>

        <!-- 时间格式化工具  -->
        <script src="{$config_siteurl}statics/admin/theme/elementui/momentjs/2.24.0.js"></script>

        <!--  Element UI START  -->
        <!-- 引入样式 -->
        <link rel="stylesheet" href="{$config_siteurl}statics/admin/theme/elementui/elementui_2.13.0/index.css">
        <!-- 引入组件库 -->
        <script src="{$config_siteurl}statics/admin/theme/elementui/elementui_2.13.0/index.js"></script>
        <!--  Element UI END  -->

        <style>
            /* vue相关  */
            [v-cloak] {
                display: none;
            }
            *{
                font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
            }
        </style>
        <script>
            /**
             * js资源加载完后进行全局初始化
             */
            ;(function () {

                $(document).ready(function () {
                    //是否启用 loading
                    window.__GLOBAL_ELEMENT_LOADING_INSTANCE_ENABLE = true;
                    //注册 ajax加载时 显示加载框
                    $(document).ajaxStart(function () {
                        if (ELEMENT && window.__GLOBAL_ELEMENT_LOADING_INSTANCE_ENABLE) {
                            //显示时间
                            window.__GLOBAL_ELEMENT_LOADING_INSTANCE_show_time = Date.now();
                            //load实例
                            window.__GLOBAL_ELEMENT_LOADING_INSTANCE = window.ELEMENT.Loading.service({
                                lock: true,
                                text: '',
                                // spinner: 'el-icon-loading',
                                // background: 'rgba(0, 0, 0, 0.7)'
                            });
                        }
                    });
                    $(document).ajaxComplete(function () {
                        if (window.__GLOBAL_ELEMENT_LOADING_INSTANCE) {
                            setTimeout(function(){
                                window.__GLOBAL_ELEMENT_LOADING_INSTANCE.close()
                            }, 0)

                        }
                    });
                    $(document).ajaxError(function () {
                        if (window.__GLOBAL_ELEMENT_LOADING_INSTANCE) {
                            setTimeout(function(){
                                window.__GLOBAL_ELEMENT_LOADING_INSTANCE.close()
                            }, 0)

                        }
                    })
                });

            })(jQuery);
        </script>
    </block>

    <block name="header"></block>

</head>
<body style="height: 100%;background-color: #F8F8F8">
<!--内容-->
<block name="content">

</block>

</body>
<!--页脚-->
<block name="footer"></block>

</html>
