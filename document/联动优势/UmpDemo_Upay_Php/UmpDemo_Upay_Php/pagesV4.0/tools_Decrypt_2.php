<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>支付结果通知回调加密数据解密（使用商户私钥数据解密）</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
<link type="text/css" rel="stylesheet"
	href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
<script language="javascript"
	src="../common/syntaxHighlighter/js/shCore.js"></script>
<script language="javascript"
	src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>

</head>
<?php
require_once 'common.php';
require_once ('mer2Plat.php');
$mer_id = $_REQUEST ['mer_id'];
$data1 = $_REQUEST ['data1'];

$map = new HashMap ();
$map->put ( "mer_id", $mer_id );
$map->put ( "data1", $data1 );


	$data2 = "";
		$data2=RSACryptUtil::decrypt($data1,$mer_id);

		
?>

  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>支付结果通知回调加密数据解密（使用商户私钥数据解密）</h3>
				<div class="mrmain">

					<table>
						<tbody>
							<tr>
								<th nowrap>商户号【mer_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mer_id'];?></strong></td>
							</tr>
                            		
                               	<tr>
                  <th valign="top" nowrap>待解密数据【data1】：</th>
                  <td><textarea name="【data1" cols="40" rows="5" readonly="readonly"><?php echo $data1;?></textarea></td>
                </tr>
                <tr>
								<th nowrap>数据解密结果【data2】：</th>
								<td nowrap><strong><?php echo $data2;?></strong></td>
							</tr>
						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>

	<div id="FOOTA"><?php include("./bottom.php");?></div>
	<script language="javascript">
dp.SyntaxHighlighter.ClipboardSwf = '../common/syntaxHighlighter/js/clipboard.swf';
dp.SyntaxHighlighter.HighlightAll('code');
</script>
</body>
</html>
<script>
</script>