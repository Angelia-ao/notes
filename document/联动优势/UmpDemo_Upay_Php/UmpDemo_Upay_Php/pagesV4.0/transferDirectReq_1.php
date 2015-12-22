<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>U付直连付款申请</title>
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
				<h3>U付直连付款申请<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./transferDirectReq_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】：</th>
									<td><input type=text class="wtxt" name="service" value="transfer_direct_req" /><span>*</span></td>
								</tr>
								<tr>
									<th>字符编码【charset】：</th>
									<td><input type=text class="wtxt" name="charset" value="UTF-8" /><span>*</span></td>
								</tr>
								<tr>
									<th>商户编号【mer_id】：</th>
									<td><input type=text class="wtxt" name="mer_id" value="6245" /><span>*</span></td>
								</tr>
								<tr>
									<th>签名方式【sign_type】：</th>
									<td><input type=text class="wtxt" name="sign_type" value="RSA" /><span>*</span></td>
								</tr>
							
								<tr>
									<th>结果通知地址【notify_url】：</th>
									<td><input type=text class="wtxt" name="notify_url"
										value="http://10.10.43.231/demo/pagesV4.0/paymentNotify_2.php" /><span>*</span></td>
								</tr>
								<tr>
									<th>响应数据格式【res_format】：</th>
									<td><input type=text class="wtxt" name="res_format"
										value="HTML" /></td>
								</tr>
								<tr>
									<th>版本号【version】：</th>
									<td><input type=text class="wtxt" name="version" value="4.0" /><span>*</span></td>
								</tr>								
								<tr>
									<th>商品订单号【order_id】：</th>
									<td><input type=text class="wtxt" name="order_id"
										value="<?php echo $orderId;?>" /><span>*</span></td>
								</tr>
								<tr>
									<th>商品订单日期【mer_date】：</th>
									<td><input type=text class="wtxt" name="mer_date"
										value="<?php echo $merDate;?>" /><span>*</span></td>
								</tr>
								<tr>
									<th>付款金额【amount】：</th>
									<td><input type=text class="wtxt" name="amount" value="1" /><span>*</span></td>
								</tr>
								<tr>
									<th>收款方账户类型【recv_account_type】：</th>
									<td><select name="recv_account_type" id="recv_account_type" >
										<option value="00">银行卡</option>
										<option value="01">存折</option>
										</select><span>*</span></td>	
								</tr>
								<tr>
									<th>收款方账户属性【recv_bank_acc_pro】：</th>
									<td><select name="recv_bank_acc_pro" id="identity_type" >
										<option value="0">对私</option>
										<option value="1">对公</option>
										</select><span>*</span></td>	
								</tr>
                                	<tr>
									<th>收款方账户发卡行【recv_gate_id】：</th>
									<td>
									<select name="recv_gate_id" id="recv_gate_id" >
									<option value="ICBC">中国工商银行</option>
									<option value="CMB">招商银行</option>
									<option value="CMBC">民生银行</option>
									<option value="BOC">中国银行</option>
									<option value="CCB" selected="selected">中国建设银行</option>
									<option value="ABC">中国农业银行</option>
									<option value="COMM">交通银行</option>
									<option value="SPDB">上海浦东发展银行</option>
									<option value="GDB">广东发展银行</option>
									<option value="CEB">中国光大银行</option>
									<option value="CIB">兴业银行</option>
									<option value="SDB">深圳发展银行</option>
									<option value="HXB">华夏银行</option>
									<option value="SHB">上海银行</option>
									<option value="PSBC">邮储银行</option>
									<option value="BJRCB">北京农村商业银行</option>
									<option value="BJB">北京银行</option>
									<option value="CITIC">中信银行</option>
									<option value="BHB">河北银行</option>
									<option value="SHRCB">上海农村商业银行</option>
									<option value="GRCB">广州农村信用合作社</option>
									<option value="SRCB">深圳市农村商业银行</option>
									<option value="GCB">广州银行</option>
									<option value="SPAB">平安银行</option>
									<option value="HZCB">杭州银行</option>
									<option value="NJCB">南京银行</option>
									<option value="NBB">宁波银行</option>
									<option value="CBHB">渤海银行</option>
									<option value="CZSB">浙商银行</option>
									<option value="BEA">东亚银行</option>
									<option value="CZCB">浙江稠州商业银行</option>
									<option value="SDEB">顺德农村信用合作社</option>
									</select><span>*</span></td>	 
								</tr>
								<tr>
									<th>收款方账号【recv_account】：</th>
									<td><input type=text name="recv_account" value=""/><span>*</span></td>	 
								</tr>
								<tr>
									<th>收款方户名【recv_user_name】：</th>
									<td><input type=text name="recv_user_name" value=""/><span>*</span></td>	 
								</tr>
                                <tr>
									<th>开户行支行全称【bank_brhname】：</th>
									<td><input type=text name="bank_brhname" value="金融街支付" /><span>*</span></td>	 
								</tr>
                                	<tr>
									<th>摘要【purpose】：</th>
									<td><input type=text name="purpose" value="remark"/><span>*</span></td>	 
								</tr>
								<tr>
									<th>省【prov_name】：</th>
									<td><input type=text name="prov_name" value="北京"/><span>*</span></td>	 
								</tr>
								
								<tr>
									<th>市【city_name】：</th>
									<td><input type=text name="city_name" value="北京"/><span>*</span></td>	 
								</tr>
								
                                    <tr><td colspan="2"><strong>收款方账户属性为对私时，证件类型、证件号码、证件持有人真实姓名、媒介类型、媒介标识为必传。为对公时，这些字段可以不传递</strong></td></tr>
								<tr>
									<th>收款方证件类型【identity_type】：</th>
									<td><select name="identity_type" id="identity_type" >
										<option value="01">身份证</option>	
                                        <option value="" selected>不传递</option>
										</select></td>	
								</tr>
								<tr>
									<th>收款方平台预留证件号码【identity_code】：</th>
									<td><input type=text name="identity_code" value=""/></td>	 
								</tr>
								<tr>
									<th>证件持有人真实姓名【identity_holder】：</th>
									<td><input type=text name="identity_holder" value=""/></td>	 
								</tr>
                                <tr>
									<th>媒介标识【media_id】：</th>
									<td><input type=text class="wtxt" name="media_id"
										value="" /></td>
								</tr>
								<tr>
									<th>媒介类型【media_type】：</th>
									<td><select name="media_type">
                                    		<option value="" selected>不传递</option>
											<option value="MOBILE">手机号码</option>
									</select></td>
								</tr>
							
							
								
								<tr>
									<th></th>
									<td><div class="pbutton2 pline">
											<input type="submit" value="提交" class="button" />
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