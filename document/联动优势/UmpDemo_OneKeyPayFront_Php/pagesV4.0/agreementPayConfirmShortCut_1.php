<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>>一键快捷--协议确认支付</title>
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
				<h3>一键快捷--协议确认支付<span>(带<font color="red">*</font>项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./agreementPayConfirmShortCut_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】</th>
									<td><select name="service">
											<OPTION value=agreement_pay_confirm_shortcut selected>agreement_pay_confirm_shortcut-(协议支付)确认支付</OPTION>
									</select><font color="red">*</font></td>
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
									<td><input type=text name="trade_no" value="1310211554444031" /><font color="red">*</font></td>	 
								</tr>
								<tr>
									<th>短信验证码【verify_code】</th>
									<td><input type=text name="verify_code" value="4432"/></td>	 
								</tr>
                <tr><td colspan="2"><strong>协议确认支付中，支付协议号必传，商户用户标识mer_cust_id、用户业务协议号usr_busi_agreement_id必传其一</strong></td></tr>
								<tr>
				                  <th >商户用户标识【mer_cust_id】</th>
				                  <td ><input type="text" value="byptumpay"  name="mer_cust_id"/>
				                </tr>
                 <tr>
                  <th>用户业务协议号【usr_busi_agreement_id】</th>
                  <td ><input type="text" value="UB201306171603250000000000000371" class="wtxt" name="usr_busi_agreement_id"/></td>
                </tr>
               <tr>
                  <th>支付协议号【usr_pay_agreement_id】</th>
                  <td><input type="text" value="P2013061817311700000000000000391" class="wtxt" name="usr_pay_agreement_id"/><font color="red">*</font></td>
                </tr>
                 <tr><td colspan="2"><strong>在协议支付中，商户可选传如下参数，作为验证用户支付要素的凭证：</strong></td></tr>
                 <tr><td colspan="2"><strong>信用卡</strong></td></tr>
								<tr>
                  <th>信用卡有效期【valid_date】</th>
                  <td><input type="text" value="1512" class="wtxt" name="valid_date"/><span>（格式为YYMM）</span>
                </tr>
                <tr>
                  <th>CVV2/CVN2【cvv2】</th>
                  <td><input type="text" value="132" class="wtxt" name="cvv2"/>
                </tr>
                 <tr><td colspan="2"><strong>借记卡</strong></td></tr>
                 <tr>
                  <th>用户出生日期【birthday】：</th>
                  <td><input type="text" value="20140310" class="wtxt" name="birthday"/><span>格式:YYYYMMDD</span></td>
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