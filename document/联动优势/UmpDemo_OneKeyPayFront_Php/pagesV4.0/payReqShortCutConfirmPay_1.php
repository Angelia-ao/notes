<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键支付-wap/html5引导链接前台确认支付请求</title>
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
				<h3>一键支付-wap/html5引导链接前台确认支付请求<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./payReqShortCutConfirmPay_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>U付订单号【tradeNo】：</th>
									<td><input type=text class="wtxt" name="tradeNo" value="1311251732538611" /><span>*</span></td>
								</tr>
                                 <tr><td colspan="2"><strong>证件类型，证件号，持卡人姓名三个参数必须同时传递值或者同时不传递。</strong></td></tr>
                                 
                                 <tr>
					<th>证件类型【identityType】：</th>
					<td><select name="identityType">
					<option value="" selected>不传递</option>
						<option value="IDENTITY_CARD">身份证号IDENTITY_CARD</option>
						</select><span>*</span>
					</td>	 
				</tr>
								<tr>
									<th>证件号【identityCode】：</th>
									<td><input type=text class="wtxt" name="identity_Code" value="" /><span>*</span></td>
								</tr>
								<tr>
									<th>持卡人姓名【cardHolder】：</th>
									<td><input type=text class="wtxt" name="card_Holder" value="" /><span>*</span></td>
								</tr>
                                
                                  <tr><td colspan="2"><strong>对于"商户用户标识"：首次支付时：如果输入该值，且用户在联动的收银台上同意一键快捷服务协议，则会注册一键快捷用户业务协议；如果用户取消点击同意，则平台不会注册用户业务协议。</strong></td></tr>
                 <tr><td colspan="2"><strong>**如果商户在该接口未传递商户用户标识参数，则平台默认为用户不同意，同时该支付类型置为快捷支付，而非一键支付，并且也不会注册用户业务协议**</strong></td></tr>
                
                                 <tr>
					<th>商户用户标识【merCustId】：</th>
					<td><input type=text class="wtxt" name="merCustId" value=""/></td>	 
				</tr>
                          <tr><td colspan="2"><strong>支付方式和银行必须同时传递或者同时不传递。</strong></td></tr>
               <tr><td colspan="2"><strong>如果同时传递，则直接跳转至已选择银行，如果同时不传递，则引导链接跳转为收银台模式</strong></td></tr>
								
                 <tr>
                  <th>支付方式【payType】：</th>
                  <td><select name="payType" id="payType" >
                  		<option value="" selected>不传递</option>
						<option value="CREDITCARD" selected>信用卡CREDITCARD</option>		
                        <option value="DEBITCARD">借记卡DEBITCARD</option>
					  </select><span>*</span></td>
                </tr>
               
               
                <tr>
                
                  <th>卡对应银行【gateId】：</th>
                  <td><select name="gateId" id="gateId" >
						<option value="">－不传递－收银台模式</option>
                        <option value="CMB">招商银行</option>
						<option value="ICBC">工商银行</option>
						<option value="ABC">农业银行</option>
                        <option value="BOC">中国银行</option>
						<option value="CCB" selected>建设银行</option>
						<option value="COMM">交通银行</option>
						<option value="CMBC">民生银行</option>
						<option value="PSBC">邮储银行</option>
                        <option value="CITIC">中信银行</option>
                        <option value="CEB">光大银行</option>
						<option value="SPDB">浦发银行</option>
						<option value="GDB">广发银行</option>
                        <option value="HXB">华夏银行</option>
                        <option value="CIB">兴业银行</option>
                        <option value="SPAB">平安银行</option>
                        <option value="BJB">北京银行</option>
					</select>
				  <span>*</span></td>
               </tr>
                             <tr>
					<th>银行预留手机号【mobileId】：</th>
					<td><input type=text class="wtxt" name="mobileId" value=""/></td>	 
				</tr>
                 <tr><td colspan="2"><strong>*是否用户在联动平台上修改商户在首次支付中上送的用户的支付要素如card_id，card_holder等*</strong></td></tr>
                  <tr>
                  <th nowrap="nowrap">是否允许用户修改支付要素【canModifyFlag】：</th>
                  <td nowrap="nowrap"><select name="canModifyFlag">
                  	   <option value="">不传值，允许修改</option>
                       <option value="0">传递0不允许修改</option>
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