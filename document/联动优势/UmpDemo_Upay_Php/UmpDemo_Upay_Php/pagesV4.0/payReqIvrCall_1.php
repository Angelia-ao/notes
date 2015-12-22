<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>IVR直呼后台下单请求</title>
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
				<h3>IVR直呼后台下单请求<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./payReqIvrCall_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】：</th>
                                    <td><input type=text class="wtxt" name="service" value="pay_req_ivr_call" /><span>*</span></td>
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
									<th>商品号【goods_id】：</th>
									<td><input type=text class="wtxt" name="goods_id"
										value="12345678" /></td>
								</tr>
								<tr>
									<th>商品描述信息【goods_inf】：</th>
									<td><input type=text class="wtxt" name="goods_inf" value="联动优势" /></td>
								</tr>
								 <tr>
                  <th>媒介标识【media_id】：</th>
                  <td><input type="text" value="13000000000" class="wtxt" name="media_id"/> <span> * media_id和media_type同传递或时同不传</span></td>
                </tr>
                <tr>
					<th>媒介类型【media_type】：</th>
					<td><select name="media_type">
						<option value="">请选择</option>
						<option value="MOBILE" selected="selected">手机号码</option>
						</select> <span> * media_id和media_type同传递或时同不传</span>
					</td>	 
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
									<td><input type=text class="wtxt" name="amount" value="1" /><span>*</span><span>*(以分为单位)</span></td>
								</tr>
								<tr>
									<th>付款币种【amt_type】：</th>
									<td><input type=text class="wtxt" name="amt_type" value="RMB" /><span>*</span></td>
								</tr>
								<tr>
									<th>默认支付方式【pay_type】：</th>
									  <td><select name="pay_type" id="pay_type" >
		    			<option value="" selected>－－默认空－－</option>
						<option value="B2BBANK" >B2B网银</option>
						<option value="B2CBANK">B2C网银</option>
						<option value="SOOPAY">U付账户</option>
						<option value="MOBILEBANKCARD">手机银行卡</option>
						<option value="CREDITCARD">信用卡</option>
						<option value="DEBITCARD">借记卡</option>	 
					  </select></td>
								
								</tr>
								<tr>
									<th>默认银行【gate_id】：</th>
								 <td><select name="gate_id" id="gate_id" >
						<option value="" selected>－－空－－</option>
						<option value="ICBC">中国工商银行</option>
						<option value="CMB">招商银行</option>
						<option value="CCB">中国建设银行</option>
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
					</select>
				  </td>
								</tr>
								<tr>
									<th>商户私有域【mer_priv】：</th>
									<td><input type=text class="wtxt" name="mer_priv" value="测试商品" /></td>
								</tr>
								<tr>
									<th>用户IP地址【user_ip】：</th>
									<td><input type=text  class="wtxt" name="user_ip" value="192.168.1.3" /></td>
								</tr>
								<tr>
									<th>业务扩展信息【expand】：</th>
									<td><input type=text class="wtxt" name="expand" value="2342234" /></td>
								</tr>

								<tr>
									<th>订单过期时常</th>
									<td><input type=text class="wtxt" name="expire_time"
										value="360" /><span> 单位：分钟</span></td>
								</tr>

								<!--  
								<tr>
									<th>商户号【merId】：</th>
									<td><input type="text" class="wtxt" name="merId" value="9996" />
										<span>*</span></td>
								</tr>
								<tr>
									<th>商品号【goodsId】：</th>
									<td><input type="text" class="wtxt" name="goodsId" value="100" /></td>
								</tr>
								<tr>
									<th>商品信息【goodsInf】：</th>
									<td><input type="text" class="wtxt" name="goodsInf"
										value="测试商品" /></td>
								</tr>
								<tr>
									<th>手机号【mobileId】：</th>
									<td><input type="text" value="" class="wtxt" name="mobileId" /></td>
								</tr>
								<tr>
									<th>订单号【orderId】：</th>
									<td><input type="text" value="<?php echo $orderId;?>"
										class="wtxt" name="orderId" /> <span>*</span></td>
								</tr>
								<tr>
									<th>下单日期【merDate】：</th>
									<td><input type="text" value="<?php echo $merDate;?>"
										class="wtxt" name="merDate" /> <span>*</span></td>
								</tr>
								<tr>
									<th>金额【amount】：</th>
									<td><input type="text" value="1000" class="wtxt" name="amount" />
										<span>*</span></td>
								</tr>
								<tr>
									<th>金额类型【amtType】：</th>
									<td><select name="amtType">
											<option value="01" selected>人民币</option>
									</select> <span>*</span></td>
								</tr>
								<tr>
									<th>支付方式【bankType】：</th>
									<td><select name="bankType" id="bankType">
											<option value="2">网银</option>
									</select><span>*</span></td>
								</tr>
								<tr>
									<th>网银网关【gateId】：</th>
									<td><select name="gateId" id="gateId">
											<option value="" selected="selected">－－空－－</option>
											<option value="0400">工商银行</option>
											<option value="2100">中国银行</option>
											<option value="0605">中国建设银行</option>
											<option value="0300">招商银行</option>
											<option value="1200">交通银行</option>
											<option value="0900">上海浦东发展银行</option>
											<option value="0700">民生银行</option>
											<option value="1100">广东发展银行</option>
											<option value="2200">中信银行</option>
											<option value="2400">中国光大银行</option>
											<option value="1700">深圳市农村商业银行</option>
											<option value="1500">上海市农村商业银行</option>
											<option value="1800">广州市商业银行</option>
											<option value="1000">深圳发展银行</option>
											<option value="1300">华夏银行</option>
											<option value="1600">广州农村信用合作社</option>
											<option value="0500">农业银行</option>
											<option value="0800">兴业银行</option>
									</select></td>
								</tr>
								<tr>
									<th>页面返回地址【retUrl】：</th>
									<td><input type="text"
										value="http://211.154.41.118/pay/test/_backToJsp3.jsp"
										class="wtxt" name="retUrl" /> <span>*</span></td>
								</tr>
								<tr>
									<th>结果通讯地址【notifyUrl】：</th>
									<td><input type="text"
										value="http://211.154.41.118/pay/test/_backToJsp3.jsp"
										class="wtxt" name="notifyUrl" /></td>
								</tr>
								<tr>
									<th>商户私有信息【merPriv】：</th>
									<td><input type="text" value="" class="wtxt" name="merPriv" />
									</td>
								</tr>
								<tr>
									<th>商户扩展信息【expand】：</th>
									<td><input type="text" value="" class="wtxt" name="expand" /></td>
								</tr>
								<tr>
									<th>版本号【version】：</th>
									<td><input type="text" value="3.0" class="wtxt" name="version" />
										<span>*</span></td>
								</tr>
								-->
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