## ZTBCMS

> 基于 ThinkPHP 6 的高性能、模块化、快速开发框架 

> High-performance, modular and rapid development framework based on ThinkPHP
 
[ZTBCMS在线文档](https://www.kancloud.cn/ztbcms/ztbcms/content) | [ThinkPHP文档](https://www.kancloud.cn/manual/thinkphp6_0/) | [ThinkTemplate模板](https://www.kancloud.cn/manual/think-template)

<a href="http://www.phptherightway.com">
    <img src="http://www.phptherightway.com/images/banners/leaderboard-728x90.png" alt="PHP: The Right Way"/>
</a>

## 环境要求

* PHP版本 7.2+
* Mysql 5.6+
* Apache 2.4
* 可选的配置URL重写，参考[ThinkPHP - URL重写](http://document.thinkphp.cn/manual_3_2.html#url_rewrite)

## 下载安装

下载最新**稳定版**
```shell
$ git clone --branch master https://github.com/ztbcms/ztbcms.git
```

下载最新**开发版**(慎用)
```shell
$ git clone https://github.com/ztbcms/ztbcms.git
```

安装依赖
```shell script
cd tp6 && composer install
```

## 版本描述

版本号采用[语义化版本semver](https://semver.org/lang/zh-CN/), 采用`MAJOR.MINOR.PATCH`来描述版本

- 主版本号 MAJOR 当你做了不兼容的 API 修改
- 次版本号 MINOR  当你做了向下兼容的功能性新增
- 修订号 PATCH 当你做了向下兼容的问题修正


## 状态码说明

- 200 正常
- 400 错误返回
- 401 未登录授权
- 403 禁止访问，没有权限
- 404 找不到

### 页面操作

NOTE: 请直接参考后台首页或文件`ztbcms.js`

1.打开新窗口
```js
//方法1. 封装后再调用
window.openNewIframe = function (title, url) {
    if (parent.window != window) {
        parent.window.__adminOpenNewFrame({
            title: title,
            url: url
        })
    } else {
        window.location.href = url;
    }
}.bind(this)

//调用
window.openNewIframe('标题','http://baidu.com');


//方法2.直接调用(兼容性差)

parent.window.__adminOpenNewFrame({
    title: '标题',
    url: 'http://baidu.com'
})

//方法3 底层实现方法,使用事件触发
var event = new CustomEvent('adminOpenNewFrame', {
  detail: {
    title: '启动父窗口1', 
    router_path: '/a/b/c', 
    url: 'http://baidu.com'
  }
})
window.parent.dispatchEvent(event)
```


2.刷新指定页面（一般很少用）

```js
var event = new CustomEvent('adminRefreshFrame', {
  detail: {
    refreshView: {
      name:'路由的name',
      meta:{
        url: "/index.php?g=Admin&m=Adminmanage&a=chanpass&menuid=6"
      },
    }
  }
})
window.parent.dispatchEvent(event)
```

3. 图标配置

到iconfont.cn选取icon,用的是svg
![图片](https://dn-coding-net-production-pp.codehub.cn/c02721e8-2d56-4407-8e59-8101e6f3fe1b.png)

在dashborad.php 引入js
![图片](https://dn-coding-net-production-pp.codehub.cn/8b6dea28-655d-4dc0-9525-848ab9452635.png)

设置菜单的icon
![图片](https://dn-coding-net-production-pp.codehub.cn/f856614b-fcbe-40f6-9f47-b332c34852dd.png)

拓展：ztbcms默认后台icon已经内置，请打开`/statics/css/iconfont/demo_index.html`查看

## 管理后台兼容性

- IE 10或以上

Javascript:
- 请务必使用ES 5的语法，增加兼容性（不要使用ES 6的`let`、`const` `=>`等语法糖）

## License 

[Apache License](LICENSE)

## 支持/Support

<!--Support start-->
<table>
  <tbody>
    <tr>
      <td align="center" valign="middle">
        <a href="https://www.jetbrains.com/?from=ztbcms" target="_blank">
          <img width="160px" src="https://i.loli.net/2019/12/05/rmZkUIH1Jgd2M5Y.png">
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="https://www.jetbrains.com/?from=ztbcms" target="_blank">
          <img width="160px" src="https://i.loli.net/2019/12/05/17jf9rLW8ixHdyD.png">
        </a>
      </td>
    </tr>
    <tr></tr>
  </tbody>
</table>
<!--Support end-->
