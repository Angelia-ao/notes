<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>无线网页类引导链接确认支付</title>
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
require_once ('mer2Plat.php');
$tradeNo = $_REQUEST ['tradeNo'];
$pay_type = $_REQUEST ['pay_type'];
$B2CBANK_gate_id = $_REQUEST ['B2CBANK_gate_id'];
$CREDITCARD_gate_id = $_REQUEST ['CREDITCARD_gate_id'];
$DEBITCARD_gate_id = $_REQUEST ['DEBITCARD_gate_id'];


$map = new HashMap ();
$map->put ( "tradeNo", $tradeNo );
$map->put ( "pay_type", $pay_type );
$map->put ( "B2CBANK_gate_id", $B2CBANK_gate_id );
$map->put ( "CREDITCARD_gate_id", $CREDITCARD_gate_id );
$map->put ( "DEBITCARD_gate_id", $DEBITCARD_gate_id );


$wap_url = "https://m.soopay.net/m/xhtml/index.do?tradeNo=".$tradeNo."&pay_type=".$pay_type."&gate_id=".$B2CBANK_gate_id.$CREDITCARD_gate_id.$DEBITCARD_gate_id;

$html5_url = "https://m.soopay.net/m/html5/index.do?tradeNo=".$tradeNo."&pay_type=".$pay_type."&gate_id=".$B2CBANK_gate_id.$CREDITCARD_gate_id.$DEBITCARD_gate_id;

?>

  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>提交信息及签名查看</h3>
				<div class="mrmain">

					<table>
						<tbody>
                          <tr><th><td colspan="2"><strong>请填入请求平台获取的响应中的trade_no</strong></td></th></tr>
							<tr>
								<th nowrap>U付订单号【tradeNo】：</th>
								<td nowrap><strong><?php echo $_REQUEST['tradeNo'];?></strong></td>
							</tr>
                            <tr><td colspan="2"><strong>收银台模式请将pay_type和所有的gate_id均置为空</strong></td></tr>
                <tr><th><td colspan="2"><strong>======================================</strong></td></th></tr>
                <tr><td colspan="2"><strong>直连模式请选择支付方式和对应支付方式的跳转银行</strong></td></tr>
							<tr>
								<th nowrap>支付方式【pay_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['pay_type'];?></strong></td>
							</tr>
                               <tr><th><td colspan="2"><strong>选择完支付方式，需选择相对应的银行列表进行跳转，并将其他两个银行id置为空</strong></td></th></tr>
							<tr>
								<th nowrap>选择手机网银【B2CBANK_gate_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['B2CBANK_gate_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>选择信用卡银行【CREDITCARD_gate_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['CREDITCARD_gate_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>选择借记卡银行【DEBITCARD_gate_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['DEBITCARD_gate_id'];?></strong></td>
							</tr>
	
							
							<tr>
								<td colspan="2"><div class="pbutton2 pline" align="center">
										<input type="submit" value="wap方式支付" class="button"
											onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $wap_url; ?>';else{return false;}" /><input type="submit" value="html5方式支付" class="button"
											onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $html5_url; ?>';else{return false;}" />
									
									</div></td>
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