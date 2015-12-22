<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键快捷-商户解除用户关联</title>
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
					一键快捷-商户解除用户关联<span>(带<font color="red">*</font>项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./unBindMerCustProtocalShortCut_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】</th>
									<td><select name="service">
											<OPTION value="unbind_mercust_protocol_shortcut" selected>商户解除用户关联</OPTION>
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
									<th>版本号【version】</th>
									<td><input type=text class="wtxt" name="version" value="4.0" /><span><font color="red">*</font></span></td>
								</tr>
							
				                 <tr>
				                  <th>商户用户标识【mer_cust_id】</th>
				                  <td><input type="text" value="UMPAYTEST" name="mer_cust_id"/> </td>
				                </tr>
				                <tr>
				                  <th>用户业务协议号【usr_busi_agreement_id】</th>
				                  <td><input type="text" value="" name="usr_busi_agreement_id"/><strong>商户用户标识、用户业务协议号必传其一</strong></td>
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