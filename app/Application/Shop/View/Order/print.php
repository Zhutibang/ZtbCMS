<!DOCTYPE html>
<html dir="ltr" lang="cn">
<head>
    <meta charset="UTF-8" />
    <title>订单打印</title>
    <link href="{$config_siteurl}statics/shop/bootstrap/css/bootstrap.css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="{$config_siteurl}statics/shop/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/shop/bootstrap/css/bootstrap.min.css"></script>
    <link href="{$config_siteurl}statics/shop/bootstrap/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <style media="print" type="text/css">.noprint{display:none}</style>
</head>
<body>
<div class="container">
    <div style="page-break-after: always;">
        <h1 class="text-center">订单信息</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>发送自</td>
                <td colspan="2">订单详情</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><address><strong>{$shop.store_name}</strong><br/>{$shop.address}</address>
                    <b>电话:</b> {$shop.phone}<br/>
                    <b>E-Mail:</b> {$shop.smtp_user}<br/>
                    <b>网址:</b> <a href="{$shop.tpshop_http}">{$shop.tpshop_http}</a>
                </td>
                <td>
                	<b>下单日期:</b> {$order.add_time|date='Y-m-d H:i:s',###}<br/>
                    <b>订单号:</b> {$order.order_sn}<br/>
                    <b>支付方式:</b>{$order.pay_name}<br/>
                    <b>配送方式:</b>{$order.shipping_name}<br/>
                    <b>订单总价:</b>{$order.total_amount}
                </td>
                <td>
                	<b>商品价格:</b> {$order.goods_price}<br/>
                    <b>配送费用:</b> {$order.shipping_price}<br/>
                    <b>订单优惠:</b> {$order.coupon_price}<br/>
                    <b>使用积分:</b> {$order.integral}<br/>
                    <b>使用余额:</b> {$order.user_money}<br/>
                    <b>应付金额:</b>{$order.order_amount}
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td colspan="4"><b>收货信息</b></td>
            </tr>
            <tr><td>收件人</td><td>联系电话</td><td>收货地址</td><td>邮编</td></tr>
            </thead>
            <tbody>
            <tr>
            	<td>{$order.consignee}</td>
            	<td>{$order.mobile}</td>
                <td>{$order.full_address}</td>
                <td>{$order.zipcode}</td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td><b>商品名称</b></td>
                <td><b>商品货号</b></td>
                <td><b>规格属性</b></td>
                <td><b>数量</b></td>
                <td><b>单价</b></td>
                <td class="text-right"><b>小计</b></td>
            </tr>
            </thead>
            <tbody>
            <volist name="orderGoods" id="good">
                <tr>
                    <td>{$good.goods_name}</td>
                     <td>{$good.goods_sn}</td>
                    <td>{$good.spec_key_name}</td>
                    <td>{$good.goods_num}</td>
                    <td>{$good.goods_price}</td>
                    <td class="text-right">{$good.goods_total}</td>
                </tr>
            </volist>
            </tbody>
            <tfoot>
            <tr><td colspan="6" class="text-center"><input class="btn btn-default noprint" type="submit" onclick="window.print();" value="打印"></td></tr>
            </tfoot>
        </table>
    </div>
</div>
</body>
</html>