<extend name="../../Admin/View/Common/element_layout"/>

<block name="content">
    <div id="app" style="padding: 8px;" v-cloak>
        <el-card>
            <h3>前台图片上传示例</h3>

            <div>
                <template v-for="(file, index) in uploadedFileList">
                    <div class="imgListItem">
                        <img :src="file.url" :alt="file.name" style="width: 128px;height: 128px;">
                        <div class="deleteMask" @click="deleteItem(index)">
                            <span style="line-height: 128px;font-size: 22px" class="el-icon-delete"></span>
                        </div>
                    </div>
                </template>
            </div>

            <input type="file" accept="image/*" v-on:change="onUploadFileChanged"/>

        </el-card>


    </div>

    <style>
        .imgListItem {
            height: 128px;
            border: 1px dashed #d9d9d9;
            border-radius: 6px;
            display: inline-flex;
            margin-right: 10px;
            margin-bottom: 10px;
            position: relative;
            cursor: pointer;
            vertical-align: top;
        }

        .deleteMask {
            position: absolute;
            top: 0;
            left: 0;
            width: 128px;
            height: 128px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            font-size: 40px;
            opacity: 0;
        }

        .deleteMask:hover {
            opacity: 1;
        }
    </style>

    <script>
        $(document).ready(function () {
            new Vue({
                el: '#app',
                data: {
                    uploadedFileList: [
                        // {
                        //     name: "屏幕快照.png",
                        //     url: "/d/file/module_upload_images/2019/03/5c7e4cf7dd1cd.png"
                        // },
                    ],

                },
                watch: {},
                filters: {
                    formatTime(timestamp) {
                        var date = new Date();
                        date.setTime(parseInt(timestamp) * 1000);
                        return moment(date).format('YYYY-MM-DD HH:mm:ss')
                    }
                },
                methods: {
                    deleteItem: function (index) {
                        this.uploadedFileList.splice(index, 1)
                    },
                    onUploadFileChanged: function (event) {
                        var that = this
                        if (event.target.files) {
                            var formData = new FormData();
                            formData.append("file", event.target.files[0]);
                            $.ajax({
                                url: "{:U('Upload/UploadPublicApi/uploadImage')}",
                                data: formData,
                                dataType: 'json',
                                type: 'post',
                                // 不要去处理发送的数据
                                processData: false,
                                // 不要去设置Content-Type请求头
                                contentType: false,
                                success: function (res) {
                                    if (res.status) {
                                        that.uploadedFileList.push({
                                            name: res.data.name,
                                            url: res.data.url,
                                        })
                                    } else {
                                        layer.msg(res.msg)
                                    }
                                }
                            })
                        }
                    }
                },
                mounted: function () {

                },

            })
        })
    </script>
</block>
