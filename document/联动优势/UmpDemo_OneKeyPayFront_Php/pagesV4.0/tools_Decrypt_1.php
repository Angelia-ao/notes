﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>支付结果通知回调加密数据解密（使用商户私钥数据解密）</title>
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
				<h3>支付结果通知回调加密数据解密（使用商户私钥数据解密）<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./tools_Decrypt_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>商户号【mer_id】：</th>
									<td><input type=text class="wtxt" name="mer_id" value="" /><span>*</span></td>
								</tr>
                               <tr>
					<th>待解密数据【data1】：</th>
					<td><textarea name="data1" cols="40" rows="5" class="text" name="data1" value=""/></textarea><span>* 未进行url编码处理的原始加密数据</span></td>	 
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