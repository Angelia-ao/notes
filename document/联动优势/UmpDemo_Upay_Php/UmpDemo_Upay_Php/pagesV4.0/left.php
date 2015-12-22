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
  <li class="ui-state-disabled"><a href="#">普通交易支付类</a></li>
  <li>
    <a href="#">无线支付类</a>
    <ul>
      <li><a onclick="javascript:goto('payReq_1.php');" title="WAP/Html5/客户端服务端下单请求">WAP/Html5/客户端下单请求</a></li>
      <li><a onclick="javascript:goto('payReqConfirmPay_1.php');" title="WAP/html5引导链接确认支付">WAP/html5引导链接确认支付</a></li>
    </ul>
  </li>
  <li>
    <a href="#">互联网类支付</a>
    <ul>
            <li>
        <a href="#">收银台</a>
        <ul>
          <li><a onclick="javascript:goto('payReqFront_1.php?payType=B2C');" title="网银类">网银类支付</a></li>
          <li><a onclick="javascript:goto('payReqFront_1.php?payType=CREDIT');" title="信用卡快捷">信用卡快捷</a></li>
        </ul>
      </li>
       <li>
       <a href="#">网银直连</a>
        <ul>
          <li><a onclick="javascript:goto('payReqDirect_1.php?payType=B2C');" title="个人网银直连类">个人网银直连</a></li>
          <li><a onclick="javascript:goto('payReqDirect_1.php?payType=B2B');" title="企业网银直连类">企业网银直连</a></li>
          <li><a onclick="javascript:goto('payReqDirect_B2CDEBIT.php?payType=B2CDEBITBANK');" title="个人网银借记卡直连类">个人网银借记卡直连</a></li>
        </ul>
       </li>
    </ul>
  </li>
 
   <li>
    <a href="#">IVR语音类支付</a>
    <ul>
      <li><a onclick="javascript:goto('payReqIvrCall_1.php');" title="IVR语音直呼">IVR语音直呼模式</a></li>
      <li><a onclick="javascript:goto('payReqIvrTCall_1.php');" title="IVR语音转呼">IVR语音转呼模式</a>   </li>
    </ul>
   </li>
  <li><a href="#">U付付款类</a>
  	 <ul>
      <li><a onclick="javascript:goto('transferDirectReq_1.php');" title="U付付款请求">U付付款请求</a></li>
    </ul>
  </li>
  <li class="ui-state-disabled"><a href="#">业务服务类</a></li>
  <li><a onclick="javascript:goto('resDataResolve_1.php');" title="响应数据解析">响应数据解析</a></li>
  <li>
    <a href="#">查询订单状态</a>
    <ul>
      <li><a onclick="javascript:goto('queryOrder_1.php');" title="普通订单查询（在线5天）">普通订单查询（在线5天）</a></li>
      <li><a onclick="javascript:goto('merOrderInfoQuery_1.php');" title="订单查询（12个月）">订单查询（12个月）</a></li>
      <li><a onclick="javascript:goto('transferQuery_1.php');" title="付款订单状态查询">付款订单状态查询</a></li>
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
     <li><a onclick="javascript:goto('queryAccountBalance_1.php');" title="商户结算账户余额查询">商户结算账户余额查询</a></li>
  <li><a onclick="javascript:goto('merNotify_1.php');" title="商户支付结果通知验签响应">商户支付结果通知验签响应</a></li>
   <li><a onclick="javascript:goto('refundNotify_1.php');" title="商户退款结果变更通知验签响应">商户退款结果变更通知验签响应</a></li>
  <li>
    <a href="#">对账文件下载接口</a>
    <ul>
      <li><a onclick="javascript:goto('downloadSettleFile_1.php');" title="普通对账文件下载">普通对账文件下载</a></li>
      <li><a onclick="javascript:goto('downloadBusiSettleFile_Transfer_1.php');" title="单笔付款对账文件下载">单笔付款对账文件下载</a></li>
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