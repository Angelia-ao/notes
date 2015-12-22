﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键快捷-查询商户用户已签约的银行列表</title>
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
				<h3>
					一键快捷-查询商户用户已签约的银行列表<span>(带<font color="red">*</font>项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./queryMerCustBankShortCut_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】：</th>
									<td><select name="service">
											<OPTION value="query_mercust_bank_shortcut" selected>查询商户用户已签约的银行列表</OPTION>
									</select><font color="red">*</font></td>
								</tr>
								<tr>
									<th>字符编码【charset】：</th>
									<td><input type=text class="wtxt" name="charset" value="UTF-8" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>商户编号【mer_id】：</th>
									<td><input type=text class="wtxt" name="mer_id" value="6245" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>签名方式【sign_type】：</th>
									<td><input type=text class="wtxt" name="sign_type" value="RSA" /><span><font color="red">*</font></span></td>
								</tr>
								
								<tr>
									<th>响应数据格式【res_format】：</th>
									<td><input type=text class="wtxt" name="res_format"
										value="HTML" /></td>
								</tr>
								<tr>
									<th>版本号【version】：</th>
									<td><input type=text class="wtxt" name="version" value="4.0" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
				                  <th>支付方式【pay_type】：</th>
				                  <td><select name="pay_type">
											<OPTION value="CREDITCARD" selected>信用卡</OPTION>
								<OPTION value="DEBITCARD">借记卡</OPTION>
									</select><span><font color="red">*</font></span></td>
				                </tr>
				             <tr><td><strong>商户用户标识、用户业务协议号必传其一,如果两者都传,平台会校验是否一致</strong></td></tr>
				                 <tr>
				                  <th>商户用户标识【mer_cust_id】：</th>
				                  <td><input type="text" value="UMPAYTEST" name="mer_cust_id"/> </td>
				                </tr>
				                <tr>
				                  <th>用户业务协议号【usr_busi_agreement_id】：</th>
				                  <td><input type="text" value="" name="usr_busi_agreement_id"/><span> 商户用户标识和用户业务协议号二者必传其一</span></td>
				                </tr>
								<tr>
									<th></th>
									<td><div class="pbutton2 pline">
											<input style="width:130px" type="submit" value="提交" class="button" />
										</div></td>
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
<script>

</script>