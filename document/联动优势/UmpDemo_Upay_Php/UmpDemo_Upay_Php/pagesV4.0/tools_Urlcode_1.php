<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>url编码/解码</title>
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
				<h3>url编码/解码<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./tools_Urlcode_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
            <tr>
					<th>待编码数据【data_e】：</th>
					<td><textarea name="data_e" cols="40" rows="5" class="text" name="data_e" value=""/></textarea></td>	 
				</tr>
                            <tr>
					<th>待解码数据【data_d】：</th>
					<td><textarea name="data_d" cols="40" rows="5" class="text" name="data_d" value=""/></textarea></td>	 
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