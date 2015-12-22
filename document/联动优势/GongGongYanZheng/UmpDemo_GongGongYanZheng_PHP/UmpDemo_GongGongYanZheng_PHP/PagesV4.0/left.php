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
      <li class="ui-state-disabled"><a href="#"><strong>公共验证</strong></a></li>
        <li><a onclick="javascript:goto('commAuth_1.php');" title="公共验证接口">公共验证接口</a></li>
      <li class="ui-state-disabled"><a href="#"><strong>调试工具</strong></a></li>
        <li><a onclick="javascript:goto('resDataResolve_1.php');" title="响应数据解析">响应数据解析</a></li>
        <li><a onclick="javascript:goto('getPlatNotifyData_1.php');" title="平台通知数据解析响应">平台通知数据解析响应</a></li>

      <li>
        <a href="#">加解密工具</a>
        <ul>
          <li><a onclick="javascript:goto('tools_Encrypt_1.php');" title="加解密工具方法">平台公钥加密</a></li>
          <li><a onclick="javascript:goto('tools_Decrypt_1.php');" title="商户私钥解密">商户私钥解密</a></li>
          <li><a onclick="javascript:goto('tools_Urlcode_1.php');" title="url编码/解码">url编码/解码</a></li>
        </ul>
      </li>

    </ul>
  </body>

</html>
