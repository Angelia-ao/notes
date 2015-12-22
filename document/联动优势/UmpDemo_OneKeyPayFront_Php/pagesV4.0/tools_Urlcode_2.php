<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>url编码/解码</title>
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
$data_e = $_REQUEST ['data_e'];
$data_d = $_REQUEST ['data_d'];

$map = new HashMap ();
$map->put ( "data_e", $data_e );
$map->put ( "data_d", $data_d );


	$data_encode = "";
	$data_decode = "";
		$data_encode = urlencode($data_e);
		$data_decode = urldecode($data_d);

		
?>

  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>url编码/解码</h3>
				<div class="mrmain">

					<table>
						<tbody>
		
                               	<tr>
                  <th valign="top" nowrap>url编码前【data_e】：</th>
                  <td><textarea name="data_e" cols="40" rows="5" readonly="readonly"><?php echo $data_e;?></textarea></td>
                </tr>
                	<tr>
                  <th valign="top" nowrap>url编码后数据【data_encode】：</th>
                  <td><textarea name="data_encode" cols="40" rows="5" readonly="readonly"><?php echo $data_encode;?></textarea></td>
                </tr>
                 <tr><td><strong>=================</strong></td></tr>
                	<tr>
                  <th valign="top" nowrap>url解码前【data_d】：</th>
                  <td><textarea name="data_d" cols="40" rows="5" readonly="readonly"><?php echo $data_d;?></textarea></td>
                </tr>
                	<tr>
                  <th valign="top" nowrap>url解码后数据【data_decode】：</th>
                  <td><textarea name="data_decode" cols="40" rows="5" readonly="readonly"><?php echo $data_decode;?></textarea></td>
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