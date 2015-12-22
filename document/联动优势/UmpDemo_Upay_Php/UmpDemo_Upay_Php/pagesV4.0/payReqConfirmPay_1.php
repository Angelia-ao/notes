<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>无线网页类引导链接确认支付</title>
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
				<h3>无线网页类引导链接确认支付<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./payReqConfirmPay_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
                             <tr><th><td colspan="2"><strong>请填入请求平台获取的响应中的trade_no</strong></td></th></tr>
							   <tr>
					<th>U付订单号【tradeNo】：</th>
					<td><input type=text class="wtxt" name="tradeNo" value="1311251732538611"/><span>*</span></td>	 
				</tr>
                 <tr><td colspan="2"><strong>收银台模式请将pay_type和所有的gate_id均置为空</strong></td></tr>
                <tr><th><td colspan="2"><strong>======================================</strong></td></th></tr>
                <tr><td colspan="2"><strong>直连模式请选择支付方式和对应支付方式的跳转银行</strong></td></tr>
              
                <tr>
                  <th>支付方式【pay_type】：</th>
                  <td><select name="pay_type" id="pay_type" >
		    			<option value="" selected>－空－收银台模式</option>
						<option value="3" >手机银行=3</option>
						<option value="6">信用卡=6</option>
						<option value="7">借记卡=7</option> 
					  </select></td>
                </tr>
               <tr><th><td colspan="2"><strong>选择完支付方式，需选择相对应的银行列表进行跳转，并将其他两个银行id置为空</strong></td></th></tr>
          
               <tr>
                  <th>手机银行选择【B2CBANK_gate_id】：</th>
                  <<td><select name="B2CBANK_gate_id" id="B2CBANK_gate_id" >
						<option value="" selected>－空－收银台模式</option>
                        <option value="2150">中国银行</option>
                        <option value="0350">招商银行</option>
                        <option value="0650">建设银行</option>
						<option value="0450">工商银行</option>
						<option value="S055">农业银行</option>
						<option value="0950">浦发银行</option>
                        <option value="2450">光大银行</option>
						<option value="0850">兴业银行</option>
					</select>
				  </td>
                
                </tr>
                <tr>
                
                  <th>信用卡银行选择【CREDITCARD_gate_id】：</th>
                  <td><select name="CREDITCARD_gate_id" id="CREDITCARD_gate_id" >
						<option value="" selected="selected">－空－收银台模式</option>
                        <option value="B007">招商银行</option>
						<option value="B003">工商银行</option>
						<option value="B002">农业银行</option>
                        <option value="B001">中国银行</option>
						<option value="B004">建设银行</option>
						<option value="B005">交通银行</option>
						<option value="B008">民生银行</option>
						<option value="B006">邮储银行</option>
                        <option value="B009">中信银行</option>
                        <option value="B010">光大银行</option>
						<option value="B015">浦发银行</option>
						<option value="B012">广发银行</option>
                        <option value="B011">华夏银行</option>
                        <option value="B014">兴业银行</option>
                        <option value="B041">平安银行</option>
                        <option value="B036">北京银行</option>
					</select>
				  </td>
               
               
               </tr>
                <tr>
               
                  <th>借记卡银行选择【DEBITCARD_gate_id】：</th>
                  <td><select name="DEBITCARD_gate_id" id="DEBITCARD_gate_id" >
						<option value="" selected="selected">－空－收银台模式</option>
                        <option value="B007">招商银行</option>
						<option value="B014">兴业银行</option>
						<option value="B002">农业银行</option>
                        <option value="B011">华夏银行</option>

					</select>
				  </td>
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