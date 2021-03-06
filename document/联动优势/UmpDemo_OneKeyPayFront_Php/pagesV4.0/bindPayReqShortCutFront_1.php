﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>用户主动签约绑卡（WEB）</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
</head>

<?php
//初始化测试数据
$orderId = rand ( 100000, 999999 );
$merDate = date ( "Ymd" );
?>

<body>
<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>用户主动签约绑卡（WEB）<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
				<form name="subForm" action="./bindPayReqShortCutFront_2.php" method="post"
						style="margin: 0px">
						<table>
							   <tbody>
              <tr>
                    <th nowrap="nowrap">接口名称【service】：</th>
                   <td nowrap="nowrap"><input type="text" class="wtxt" name="service" value="bind_req_shortcut_front"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">字符编码【charset】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="charset" value="UTF-8"/> <span>*</span></td>
               </tr>
               <tr>
               <th nowrap="nowrap">签名方式【sign_type】：</th>
               <td nowrap="nowrap"><input type="text" class="wtxt" name="sign_type" value="RSA"/> <span>*</span></td>
               </tr>
               <tr>
                 <th nowrap="nowrap">商户号【mer_id】：</th>
                 <td nowrap="nowrap"><input type="text" class="wtxt" name="mer_id" value="6245"/> <span>*</span></td>
               </tr>
               <tr>
                  <th nowrap="nowrap">页面返回地址【ret_url】：</th>
                  <td nowrap="nowrap"><input type="text" value="http://114.113.159.207:8756/pgtest/notify0000V4.jsp" class="wtxt" name="ret_url"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">结果通讯地址【notify_url】：</th>
                  <td nowrap="nowrap"><input type="text" value="http://114.113.159.207:8756/pgtest/notify0000V4.jsp" class="wtxt" name="notify_url"/><span>*</span></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">响应数据格式【res_format】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="res_format" value="HTML"/> <span>*</span></td>
                </tr>
               <tr>
                  <th nowrap="nowrap">版本号【version】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="version" value="4.0"/> <span>*</span></td>
                </tr>
                
             
                <tr>
                  <th nowrap="nowrap">支付方式【pay_type】：</th>
                  <td nowrap="nowrap"><select name="pay_type" id="pay_type">
			            <option value="CREDITCARD" selected="selected">信用卡</option>
                            <option value="DEBITCARD">借记卡</option>
					  </select> <span>*</span></td>
                </tr>
				<tr>
                  <th nowrap="nowrap">支付信用卡所属银行【gate_id】：</th>
                  <td nowrap="nowrap"><select name="gate_id" id="gate_id">
		                <option value="ICBC">中国工商银行</option>
		                <option value="CMB">招商银行</option>
		                <option value="CCB" selected="selected">中国建设银行</option>
		                <option value="BOC">中国银行</option>
		                <option value="ABC">中国农业银行</option>
		                <option value="COMM">交通银行</option>
		                <option value="SPDB">上海浦东发展银行</option>
		                <option value="GDB">广东发展银行</option>
		                <option value="CITIC">中信银行</option>
		                <option value="CEB">中国光大银行</option>
		                <option value="CIB">兴业银行</option>
		                <option value="SDB">深圳发展银行</option>
		                <option value="CMBC">中国民生银行</option>
					  </select><span>*（银行列表仅供参考）</span>
				  </td>
                </tr>
			
                <tr>
                  <th nowrap="nowrap">商户用户标识【mer_cust_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="UMPAYTEST" class="wtxt" name="mer_cust_id"/> </td>
                </tr>
                <tr><td colspan="2"><strong>针对首次支付，商户可以选择上送如下支付要素，联动会将商户上送的参数展示给用户，由用户补全：</strong></td></tr>
                <tr>
                  <th nowrap="nowrap">卡号【card_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="card_id"/> </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">信用卡有效期【valid_date】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="valid_date"/>（格式为YYMM） </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">CVV2/CVN2【cvv2】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="cvv2"/></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">媒介类型【media_type】：</th>
                  <td nowrap="nowrap"><select name="media_type">
                  	   <option value="">不传</option>
                       <option value="MOBILE" selected>手机号码</option>
                </select> <span>media_id和media_type同传或同时不传</span></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">媒介标识（银行预留手机号码）【media_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="15001052294" class="wtxt" name="media_id"/> <span>media_id和media_type同传或同时不传</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">证件类型【identity_type】：</th>
                  <td nowrap="nowrap"><select name= "identity_type">
                  		<option value="">不传</option>
                        <option value="IDENTITY_CARD">身份证</option>
			            <option value="OFFICER_CERTIFICATE">军官证</option>
			            <option value="PASSPORT">护照</option>
                    </select></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">证件号【identity_code】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="identity_code"/></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">持卡人姓名【card_holder】：</th>
                  <td nowrap="nowrap"><input type="text" value="" class="wtxt" name="card_holder"/></td>
                </tr>
           <tr><td colspan="2"><strong>*是否用户在联动平台上修改商户在首次支付中上送的用户的支付要素如card_id，card_holder等*</strong></td></tr>
           		  <tr>
                  <th nowrap="nowrap">是否允许用户修改支付要素【can_modify_flag】：</th>
                  <td nowrap="nowrap"><select name="can_modify_flag">
                  	   <option value="">不传值，允许修改</option>
                       <option value="0">传递0不允许修改</option>
                </select></td>
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
<script>

</script>
</html>
