<?php 
include __DIR__.'/../../includes/header.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1" />
    <title>订单详情</title>
    <link rel="stylesheet" type="text/css" href="../../css/base.css">
    <link rel="stylesheet" type="text/css" href="../../css/nctouch_member.css">
    <link rel="stylesheet" type="text/css" href="../../css/nctouch_common.css">
</head>
<body>
<header id="header">
    <div class="header-wrap">
        <div class="header-l"> <a href="javascript:history.go(-1)"> <i class="back"></i> </a> </div>
        <div class="header-title">
            <h1>订单详情</h1>
        </div>
        <div class="header-r"> <a id="header-nav" href="javascript:void(0);"><i class="more"></i><sup></sup></a> </div>
    </div>
    <div class="nctouch-nav-layout">
        <div class="nctouch-nav-menu"> <span class="arrow"></span>
            <ul>
                <li><a href="../../index.html"><i class="home"></i>首页</a></li>
                <li><a href="../search.html"><i class="search"></i>搜索</a></li>
                <li><a href="javascript:void(0);"><i class="message"></i>消息<sup></sup></a></li>
            </ul>
        </div>
    </div>
</header>
<div class="nctouch-main-layout mb20" id="order-info-container"> </div>
<footer id="footer"></footer>
<script type="text/html" id="order-info-tmpl">
    <div class="nctouch-oredr-detail-block order-status-bg">
        <h3><i class="orders"></i>交易状态</h3>
        <div class="order-state"><%=order_state_con%></div>
    </div>
    <div class="nctouch-oredr-detail-block">
        <h3><i class="phone"></i>手机号码：</h3>
        <span class="msg-phone"><%=order_receiver_contact%></span>
    </div>
    <%if (order_message != ''){%>
    <div class="nctouch-oredr-detail-block">
        <h3><i class="msg"></i>买家留言</h3>
        <div class="info"><%=order_message%></div>
    </div>
    <%}%>

    <% if(code_list){ %>
    <div class="nctouch-vr-order-codes">
        <div class="tit">
            <h3>虚拟兑换码</h3>
            <span>有效期至<%=common_virtual_date%></span>
        </div>
        <ul>
            <%for (var i=0;i<code_list.length;i++){%>
            <%if(code_list[i].virtual_code_status == 0){%>
            <li><em>有效</em><%=code_list[i].id%> <span>二维码</span><br>
                <%if(goods_list[i].goods_image){%><img style="display: none; margin-left: 2rem;" src="<%=goods_list[i].goods_image%>"><%}%>
            </li>
            <%}%>
            <%}%>
            <%for (var i=0;i<code_list.length;i++){%>
            <%if(code_list[i].virtual_code_status != 0){%>
            <li class="lose"><em>失效</em><%=code_list[i].id%></li>
            <%}%>
            <%}%>
        </ul>
    </div>
    <% } %>
    <div class="nctouch-vr-order-location">
        <div class="tit">
            <h3><i class="msg"></i>商家信息</h3>
        </div>
        <div class="default" id="goods-detail-o2o">
        </div>
        <div class="more-location"><a href="javascript:void(0);" id="store_addr_list"></a><i class="arrow-r"></i></div>
    </div>
    <!-- 重改商家信息 -->
    <!-- <div class="stores-message">
        <div class="right">
            <dl>
                <dt>商家：</dt>
                <dd>腾讯科技公司官方旗舰店</dd>
            </dl>
            <dl>
                <dt>所在地址：</dt>
                <dd></dd>
            </dl>
            <dl>
                <dt></dt>
                <dd></dd>
            </dl>
            <dl>
                <dt></dt>
                <dd></dd>
            </dl>
        </div> -->
    </div>
    <div class="nctouch-order-item mt5">
        <div class="nctouch-order-item-head">
            <a href="javascript:void(0);" class="store"><i class="icon"></i>订单商品</a>
        </div>
        <%for (var i=0;i<goods_list.length;i++){%>
        <div class="nctouch-order-item-con">
            <div class="goods-block detail">
                <a href="<%=WapSiteUrl%>/tmpl/product_detail.html?goods_id=<%=goods_list[i].goods_id%>">
                    <div class="goods-pic">
                        <img src="<%=goods_list[i].goods_image%>">
                    </div>
                    <dl class="goods-info">
                        <dt class="goods-name"><%=goods_list[i].goods_name%></dt>
                        <dd class="goods-type"><%=goods_list[i].order_spec_info%></dd>
                    </dl>
                    <div class="goods-subtotal">
                        <span class="goods-price">￥<em><%=goods_list[i].goods_price%></em></span>
                        <span class="goods-num">x<%=goods_list[i].order_goods_num%></span>
                    </div>
                </a>
            </div>
        </div>
        <% } %>
    </div>
    <div class="nctouch-oredr-detail-block mt5">
        <ul class="order-log">
            <li>订单编号：<%=order_id%></li>
            <li>创建时间：<%=order_create_time%></li>
            <% if(payment_time !== '0000-00-00 00:00:00'){%>
            <li>付款时间：<%=payment_time%></li>
            <%}%>
            <% if(order_finished_time !== '0000-00-00 00:00:00'){%>
            <li>完成时间：<%=order_finished_time%></li>
            <%}%>
        </ul>
    </div>
    <div class="nctouch-oredr-detail-bottom">
        <% if (order_status == 1) {%>
        <a href="javascript:void(0)" order_id="<%=order_id%>" class="btn cancel-order">取消订单</a>
        <% } %>
        <% if (order_refund_status == 1) {%>
        <a href="javascript:void(0)" order_id="<%=order_id%>" class="btn all_refund_order">订单退款</a>
        <% } %>
        <% if (order_status == 6 && order_buyer_evaluation_status == 0) {%>
        <a href="javascript:void(0)" order_id="<%=order_id%>" class="btn evaluation-order">评价订单</a>
        <% } %>
    </div>
</script>
<script type="text/html" id="list-address-script">
    <% for (var i=0;i<addr_list.length;i++) {%>
    <li>
        <dl>
            <a href="javascript:void(0)" index_id="<%=i%>">
                <dt><%=addr_list[i].name_info%><span><i></i>查看地图</span></dt>
                <dd><%=addr_list[i].address_info%></dd>
            </a>
        </dl>
        <span class="tel"><a href="tel:<%=addr_list[i].phone_info%>"></a></span>
    </li>
    <% } %>
</script>
<script type="text/javascript" src="../../js/zepto.min.js"></script>
<script type="text/javascript" src="../../js/template.js"></script>

<script type="text/javascript" src="../../js/common.js"></script>
<script type="text/javascript" src="../../js/simple-plugin.js"></script>
<script type="text/javascript" src="../../js/tmpl/vr_order_detail.js"></script>
<!--o2o分店地址Begin-->
<div id="list-address-wrapper" class="nctouch-full-mask hide">
    <div class="nctouch-full-mask-bg"></div>
    <div class="nctouch-full-mask-block">
        <div class="header">
            <div class="header-wrap">
                <div class="header-l"> <a href="javascript:void(0);"> <i class="back"></i> </a> </div>
                <div class="header-title">
                    <h1>商家信息</h1>
                </div>
            </div>
        </div>
        <div class="nctouch-main-layout">
            <div class="nctouch-o2o-tip"><a href="javascript:void(0);" id="map_all"><i></i>全部实体分店共<em></em>家<span></span></a></div>
            <div class="nctouch-main-layout-a" id="list-address-scroll">
                <ul class="nctouch-o2o-list" id="list-address-ul">
                </ul>
            </div>
        </div>
    </div>
</div>
<!--o2o分店地址End-->
<!--o2o分店地图Begin-->
<div id="map-wrappers" class="nctouch-full-mask hide">
    <div class="nctouch-full-mask-bg"></div>
    <div class="nctouch-full-mask-block">
        <div class="header transparent-map">
            <div class="header-wrap">
                <div class="header-l"> <a href="javascript:void(0);"> <i class="back"></i> </a> </div>
            </div>
        </div>
        <div class="nctouch-map-layout">
            <div id="baidu_map" class="nctouch-map"></div>
        </div>
    </div>
</div>
<!--o2o分店地图End-->
<!--底部总金额固定层End-->
<div class="nctouch-bottom-mask">
    <div class="nctouch-bottom-mask-bg"></div>
    <div class="nctouch-bottom-mask-block">
        <div class="nctouch-bottom-mask-tip"><i></i>点击此处返回</div>
        <div class="nctouch-bottom-mask-top"><a class="nctouch-bottom-mask-close" href="javascript:void(0);"><i></i></a>
            <div class="msg-again-layout">
                <h4>如果您没有收到虚拟商品兑换码或更改其它手机接收信息，请正确输入接收用手机号码并确认发送。</h4>
                <h5>系统最多可重新发送5次兑换码提示信息。</h5>
                <input type="tel" name="buyer_phone" class="inp-tel" id="buyer_phone" autocomplete="off" maxlength="11" />
            </div>
            <p class="rpt_error_tip"></p>
        </div><a href="javascript:void(0);" id="tosend" class="btn-l mt10">确认发送</a>
    </div>
</div>
</body>
</html>
<?php 
include __DIR__.'/../../includes/footer.php';
?>