<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键支付--获取短信验证码</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
</head>

  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>一键支付--获取短信验证码<span>(带<font color="red">*</font>项为必填)</span>
				</h3>
                 <div>在协议支付中，下发验证码的手机号为协议中的手机号，即用户首次支付成功的手机号，联动平台会记录，并在协议支付中向该手机号下发短信验证码。</div>
				<div class="mrmain">
					<form name="subForm" action="./reqSmsVerifyShortCut_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】</th>
									<td><select name="service">
											<OPTION value=req_smsverify_shortcut selected>req_smsverify_shortcut-获取短信验证码</OPTION>
									</select></td>
								</tr>
								<tr>
									<th>字符编码【charset】</th>
									<td><input type=text class="wtxt" name="charset" value="UTF-8" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>商户编号【mer_id】</th>
									<td><input type=text class="wtxt" name="mer_id" value="6245" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>签名方式【sign_type】</th>
									<td><input type=text class="wtxt" name="sign_type" value="RSA" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>响应数据格式【res_format】</th>
									<td><input type=text class="wtxt" name="res_format"
										value="HTML" /></td>
								</tr>
								<tr>
									<th>版本号【version】</th>
									<td><input type=text class="wtxt" name="version" value="4.0" /><span><font color="red">*</font></span></td>
								</tr>
							
								<tr>
									<th>U付交易号【trade_no】</th>
									<td><input type=text name="trade_no" value="1310211554444031" /></td>	 
								</tr>

                <tr><td colspan="2"><strong style="font-size: 12px">使用协议进行支付，上送如下参数：支付协议号必填、商户用户标识和用户业务协议号必填其一</strong></td></tr>
                 <tr>
                  <th nowrap="nowrap">商户用户标识【mer_cust_id】</th>
                  <td nowrap="nowrap"><input type="text" value="byptumpay" class="wtxt" name="mer_cust_id"/> </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">用户业务协议号【usr_busi_agreement_id】</th>
                  <td nowrap="nowrap"><input type="text" value="UB201306171603250000000000000371" class="wtxt" name="usr_busi_agreement_id"/></td>
                </tr>
               <tr>
                  <th nowrap="nowrap">支付协议号【usr_pay_agreement_id】</th>
                  <td nowrap="nowrap"><input type="text" value="P2013061817311700000000000000391" class="wtxt" name="usr_pay_agreement_id"/><span><font color="red">*</font></span></td>
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