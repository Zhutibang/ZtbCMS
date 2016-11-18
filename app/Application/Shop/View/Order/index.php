<include file="Public/min-header"/>
<link href="{$config_siteurl}statics/shop/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/shop/plugins/daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="{$config_siteurl}statics/shop/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<div class="wrapper">
    <!-- Content Header (Page header) -->
    <include file="Public/breadcrumb"/>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> 订单列表</h3>
                </div>
                <div class="panel-body">
                    <div class="navbar navbar-default">
                            <form action="{:U('Admin/order/export_order')}" id="search-form2" class="navbar-form form-inline" method="post">
                                <div class="form-group">
                                    <label class="control-label" for="input-order-id">收货人</label>
                                    <div class="input-group">
                                        <input type="text" name="consignee" placeholder="收货人" id="input-member-id" class="input-sm" style="width:100px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-order-id">订单编号</label>
                                    <div class="input-group">
                                        <input type="text" name="order_sn" placeholder="订单编号" id="input-order-id" class="input-sm" style="width:100px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-date-added">下单日期</label>
                                    <div class="input-group">
                                        <input type="text" name="timegap" value="{$timegap}" placeholder="下单日期"  id="add_time" class="input-sm">
					                 </div>
                                </div>
                                <div class="form-group">
                                    <select name="pay_status" class="input-sm" style="width:100px;">
                                            <option value="">支付状态</option>
                                            <option value="0">未支付</option>
                  		            <option value="1">已支付</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="pay_code" class="input-sm" style="width:100px;">
                                        	<option value="">支付方式</option>
                                            <option value="alipay">支付宝支付</option>
                  							<option value="weixin">微信支付</option>
                  							<option value="cod">货到付款</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="shipping_status" class="input-sm" style="width:100px;">
                                        	<option value="">发货状态</option>
                                            <option value="0">未发货</option>
                  							<option value="1">已发货</option>
                  							<option value="2">部分发货</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="order_status" class="input-sm" style="width:100px;">
                                        <option value="">订单状态</option>
                                        <volist name="order_status" id="v" key="k">
                                            <option value="{$k-1}">{$v}</option>
                                        </volist>
                                    </select>
                                    <input type="hidden" name="order_by" value="order_id">
                                    <input type="hidden" name="sort" value="desc">
                                    <input type="hidden" name="user_id" value="{$_GET[user_id]}">
                                </div>
                                <div class="form-group">
                                	<a href="javascript:void(0)" onclick="ajax_get_table('search-form2',1)" id="button-filter search-order" class="btn btn-primary"><i class="fa fa-search"></i> 筛选</a>
                                </div>
                                <div class="form-group">
                                	<a href="/index.php?m=Admin&c=Order&a=add_order" class="btn btn-primary"><i class="fa fa-search"></i>添加订单</a>
                                </div>                                
                                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-file-excel-o"></i>&nbsp;导出excel</button>                               
                            </form>
                    </div>
                    <div id="ajax_return">

                    </div>

                </div>
            </div>
        </div>        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function(){
        ajax_get_table('search-form2',1);
        
		$('#add_time').daterangepicker({
			format:"YYYY/MM/DD",
			singleDatePicker: false,
			showDropdowns: true,
			minDate:'2016/01/01',
			maxDate:'2030/01/01',
			startDate:'2016/01/01',
		    locale : {
	            applyLabel : '确定',
	            cancelLabel : '取消',
	            fromLabel : '起始时间',
	            toLabel : '结束时间',
	            customRangeLabel : '自定义',
	            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
	            monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月' ],
	            firstDay : 1
	        }
		});
    });
    
    // ajax 抓取页面
    function ajax_get_table(tab,page){
        cur_page = page; //当前页面 保存为全局变量
            $.ajax({
                type : "POST",
                url:"{:U('Order/ajaxindex')}&p="+page,//+tab,
                data : $('#'+tab).serialize(),// 你的formid
                success: function(data){
                    $("#ajax_return").html('');
                    $("#ajax_return").append(data);
                }
            });
    }

    // 点击排序
    function sort(field)
    {
        $("input[name='order_by']").val(field);
        var v = $("input[name='sort']").val() == 'desc' ? 'asc' : 'desc';
        $("input[name='sort']").val(v);
        ajax_get_table('search-form2',cur_page);
    }
</script>
</body>
</html>