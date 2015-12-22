<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
  <head>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#menu" ).menu();
  });
  function goto(url){
  	document.location.href=url;
  };
  </script>
  <style>
  .ui-menu { margin: -15px 2px;width: 218px; line-height:0;background:#EBFAFF url(../common/img/msel.jpg) no-repeat bottom left;}
  .ui-menu .ui-menu-item a{ width: 208px; line-height:2;background:#EBFAFF url(../common/img/msel.jpg) no-repeat bottom left;cursor:hand;margin:1px;}
  .ui-menu ul li{background:#EBFAFF url(../common/img/msel.jpg) no-repeat bottom left;width:208px;height:32px;padding:0,0,0,0;margin:1px;position:relative;cursor:hand;}
  .ui-menu ul li ul li{background:#EBFAFF url(../common/img/msel.jpg) no-repeat bottom left;width:208px;height:32px;padding:0,2,0,0;margin:1px;position:relative;overflow:hidden;cursor:hand;}
  </style>	
 </head> 
 <body>
 <ul id="menu">
  <li class="ui-state-disabled"><a href="#"><strong>一键支付-前台模式</strong></a>
     
   <li><a href="#">前台模式-首次支付</a>
        <ul> 
          <li><a onclick="javascript:goto('payReqShortCutFront_1.php');" title="WEB类前台首次支付请求">WEB类前台首次支付请求</a></li>
          <li><a onclick="javascript:goto('payReqShortCut_1.php');" title="wap/html5/客户端类后台请求">wap/html5/客户端类后台API下单</a></li>
          <li><a onclick="javascript:goto('payReqShortCutConfirmPay_1.php');" title="wap/html5引导链接确认支付">wap/html5引导链接确认支付</a></li>
        </ul>
   </li>
      <li><a href="#">前台模式-协议支付</a>
        <ul>
          <li><a onclick="javascript:goto('payReqShortCut_1.php');" title="API下单">API下单</a></li>
          <li><a onclick="javascript:goto('reqSmsVerifyShortCut_1.php');" title="获取短信验证码">获取短信验证码</a></li>
          <li><a onclick="javascript:goto('agreementPayConfirmShortCut_1.php');" title="协议确认支付">协议确认支付</a></li>
        </ul>
      </li>
     
<li class="ui-state-disabled"><a href="#"><strong>查询，签约解约服务</strong></a>
      <li><a href="#">查询，签约解约服务</a>
        <ul>
          <li><a onclick="javascript:goto('bindPayReqShortCutFront_1.php');" title="用户签约绑卡-前台-（WEB）">用户签约绑卡-前台-（WEB）</a></li>
          <li><a onclick="javascript:goto('bindPayReqShortCutFrontWap-Html5_1.php');" title="用户签约绑卡-前台-WAP/HTML5">用户签约绑卡-前台-WAP/HTML5</a></li>
          <li><a onclick="javascript:goto('queryMerBankShortCut_1.php');" title="查询商户支持的银行列表">查询商户支持的银行列表</a></li>
          <li><a onclick="javascript:goto('queryMerCustBankShortCut_1.php');" title="查询商户用户已签约的银行列表">查询商户用户已签约的银行列表</a></li>
          <li><a onclick="javascript:goto('unBindMerCustProtocalShortCut_1.php');" title="商户解除用户关联">商户解除用户关联</a></li>
        </ul>
      </li>
      </li>
   <li class="ui-state-disabled"><a href="#"><strong>业务服务类</strong></a></li>
  <li><a onclick="javascript:goto('resDataResolve_1.php');" title="响应数据解析">响应数据解析</a></li>
  <li>
    <a href="#">查询订单状态</a>
    <ul>
      <li><a onclick="javascript:goto('queryOrder_1.php');" title="普通订单查询（在线5天）">普通订单查询（在线5天）</a></li>
      <li><a onclick="javascript:goto('merOrderInfoQuery_1.php');" title="订单查询（12个月）">订单查询（12个月）</a></li>
      <li><a onclick="javascript:goto('merRefundQuery_1.php');" title="退款订单状态查询">退款订单状态查询</a></li>
    </ul>
  </li>
  <li><a onclick="javascript:goto('merCancel_1.php');" title="商户撤销交易">商户交易撤销</a></li>
  <li>
    <a href="#">商户退费</a>
    <ul>
      <li><a onclick="javascript:goto('merRefund_1.php');" title="普通订单退费请求">普通订单退费请求</a></li>
    </ul>
  </li>
  <li><a onclick="javascript:goto('merNotify_1.php');" title="商户支付结果通知验签响应">商户支付结果通知验签响应</a></li>
   <li><a onclick="javascript:goto('refundNotify_1.php');" title="商户退款结果变更通知验签响应">商户退款结果变更通知验签响应</a></li>
  <li>
    <a href="#">对账文件下载接口</a>
    <ul>
      <li><a onclick="javascript:goto('downloadSettleFile_1.php');" title="普通对账文件下载">普通对账文件下载</a></li>
    </ul>
  </li>
<li>
    <a href="#">加解密工具方法类</a>
    <ul>
       <li><a onclick="javascript:goto('tools_Encrypt_1.php');" title="UMP公钥加密">UMP公钥加密</a></li>
          <li><a onclick="javascript:goto('tools_Decrypt_1.php');" title="商户私钥解密">商户私钥解密</a></li>
             <li><a onclick="javascript:goto('tools_Urlcode_1.php');" title="url编码/解码">url编码/解码</a></li>
    </ul>
 </ul>
    </ul>
    </ul>  
    </li>
</ul>
</body>
</html>