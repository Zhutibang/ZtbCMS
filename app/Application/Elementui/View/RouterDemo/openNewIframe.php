<extend name="../../Admin/View/Common/element_layout"/>

<block name="content">
    <div id="app" style="padding: 8px;" v-cloak>
        <el-card>
            <h3>打开新的iframe</h3>
            <p>使用后台</p>
            <el-button type="primary" @click="gotoAdminPage">后台页面内新开后台页面</el-button>
            <el-button type="primary" @click="gotoOutside1">后台页面内内容页新开外链</el-button>
            <el-button type="primary" @click="gotoOutside2">后台页面外新开外链</el-button>
        </el-card>


    </div>

    <style>

    </style>

    <script>
        $(document).ready(function () {
            new Vue({
                el: '#app',
                data: {},
                watch: {},
                filters: {},
                methods: {
                    gotoAdminPage: function () {
                        window.openNewIframe('修改个人信息', '/index.php?g=Admin&m=Adminmanage&a=myinfo')
                    },

                    gotoOutside1: function () {
                        window.openNewIframe('百度搜索', 'https://www.baidu.com/s?wd=ztbcms')
                    },

                    gotoOutside2: function () {
                        window.open('https://www.baidu.com/s?wd=ztbcms')
                    },

                },
                mounted: function () {

                },

            })
        })
    </script>
</block>
