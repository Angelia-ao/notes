<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>公共验证接口</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
  </head>
  <body>
  <?php	
    $orderId = rand ( 1000000000, 9999999999 );	
    $merDate = date ( "Ymd" );	
  ?>
    <div id="HEADA"><?php include("./head.php");?></div>
    <div id="MAINA">
      <div class="mindexa">
        <div class="mleft">
          <?php include("./left.php");?>
        </div>
        <div class="mright">
          <h3>公共验证接口<span>(带*项为必填)</span></h3>
          <div class="mrmain">
            <form name="subForm" action="commAuth_2.php" method="post" style="margin:0px">
            <table>
              <tbody>

                <tr><th><strong>协议参数</strong></th></tr>

                <tr>
                  <th nowrap="nowrap">接口名称【service】：</th>
                  <td nowrap="nowrap"><input style="background:#ADADAD" readonly type="text" class="wtxt" name="service" value="comm_auth"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">字符编码【charset】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="charset" value="UTF-8"/> <span>* 商户使用的字符集，支持UTF-8、GBK、GB2312、GB18030</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">商户编号【mer_id】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="mer_id" value="6245"/> <span>* 修改为您公司的商户号</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">签名方式【sign_type】：</th>
                  <td nowrap="nowrap"><input style="background:#ADADAD" readonly type="text" class="wtxt" name="sign_type" value="RSA"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">签名【sign】：</th>
                  <td> <span>* 由com.umpay.api.paygate.v40.Mer2Plat_v40生成</span> </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">版本号【version】：</th>
                  <td nowrap="nowrap"><input style="background:#ADADAD" readonly type="text" class="wtxt" name="version" value="1.0"/> <span>*</span></td>
                </tr>

                <tr><th><strong>业务参数</strong></th></tr>
                <tr>
                  <th nowrap="nowrap">验证类型【auth_type】：</th>
                  <td nowrap="nowrap"><input style="background:#ADADAD" readonly type="text" class="wtxt" name="auth_type" value="1"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">验证模式【auth_mode】：</th>
                  <td nowrap="nowrap"><select name="auth_mode">
                       <option value="">不传值自动匹配</option>
                       <option value="0">0-银行卡实名认证</option>
                       <option value="3">3-身份认证</option>
                </select> <span>不传递该值会根据传入参数自动匹配验证模式,参数传递需严格按照规范传递</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">商户订单号【order_id】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="order_id" value="<?php echo $orderId;?>"/><span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">银行卡号【bank_account】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="bank_account"/></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">账户姓名【account_name】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="account_name"/><span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">证件类型【identity_type】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="identity_type"/> <span>银行卡认证auth_mode=0，传值:1;身份认证auth_mode=3，不传递</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">证件号【identity_code】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="identity_code"/></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">手机号【mobile_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="mobile_id"/> <span>银行预留手机号</span></td>
                </tr>

               <tr>
                  <th></th>
                  <td><div class="pbutton2 pline"><input type="submit" value="提交" class="button" /></div></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="FOOTA"><?php include("./bottom.php");?></div>
  </body>
</html>
