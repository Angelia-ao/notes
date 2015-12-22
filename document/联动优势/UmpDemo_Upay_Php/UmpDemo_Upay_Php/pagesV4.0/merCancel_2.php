<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>商户撤销交易</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
	<link type="text/css" rel="stylesheet" href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
	<script language="javascript" src="../common/syntaxHighlighter/js/shCore.js"></script>
	<script language="javascript" src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>

  </head>
<?php 
    //引入API文件
  	require_once ('mer2Plat.php');
  
	$service=$_REQUEST['service'];
	$charset=$_REQUEST['charset'];
	$mer_id=$_REQUEST['mer_id'];
	$sign_type=$_REQUEST['sign_type'];
	$res_format=$_REQUEST['res_format'];
	$order_id=$_REQUEST['order_id'];
	$mer_date=$_REQUEST['mer_date'];
	$amount=$_REQUEST['amount'];
	$version=$_REQUEST['version'];
	
	$map =new HashMap();
	$map->put("service",$service);
	$map->put("charset",$charset);
	$map->put("mer_id",$mer_id);
	$map->put("sign_type",$sign_type);
	$map->put("order_id",$order_id);
	$map->put("mer_date",$mer_date);
	$map->put("res_format",$res_format);
	$map->put("amount",$amount);
	$map->put("version",$version);
	
	$reqData = MerToPlat::requestTransactionsByGet($map);
	$sign = $reqData->getSign();//这个是为了在本DEMO中显示签名结果。
	$plain = $reqData->getPlain();//这个是为了在本DEMO中显示签名原串
	$url = $reqData->getUrl();
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
                <tr>
                  <th nowrap>接口名称【service】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['service'];?></strong><input type="hidden" name="service" value="<?php echo $_REQUEST['service'];?>"/></td>
				 </tr>
				 <tr>
                  <th nowrap>字符编码【charset】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['charset'];?></strong><input type="hidden" name="charset" value="<?php echo $_REQUEST['charset'];?>"/></td>
                </tr>
                 <tr>
                  <th nowrap>响应数据格式【res_format】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['res_format'];?></strong><input type="hidden" name="res_format" value="<?php echo $_REQUEST['res_format'];?>"/></td>
                </tr>
                <tr>
                  <th nowrap>签名方式【sign_type】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['sign_type'];?></strong><input type="hidden" name="sign_type" value="<?php echo $_REQUEST['sign_type'];?>"/></td>
                </tr>
                <tr>
                  <th nowrap>商户号【mer_id】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['mer_id'];?></strong><input type="hidden" name="mer_id" value="<?php echo $_REQUEST['mer_id'];?>"/></td>
				 </tr>
				<tr>
                  <th nowrap>原订单号【order_id】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['order_id'];?></strong><input type="hidden" name="order_id" value="<?php echo $_REQUEST['order_id'];?>"/></td>
				</tr>
				<tr>
                  <th nowrap>原订单日期【mer_date】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['mer_date'];?></strong><input type="hidden" name="mer_date" value="<?php echo $_REQUEST['mer_date'];?>"/></td>
                </tr>
				<tr>
                  <th nowrap>交易金额【amount】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['amount'];?></strong><input type="hidden" name="amount" value="<?php echo $_REQUEST['amount'];?>"/></td>
				</tr>
				<tr>
                  <th nowrap>版本号【version】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['version'];?></strong><input type="hidden" name="version" value="<?php echo $_REQUEST['version'];?>"/></td>
				</tr>
				<tr>
                  <th valign="top" nowrap>签名串【sign】：</th>
                  <td><textarea name="sign" cols="40" rows="5" readonly="readonly"><?php echo $sign;?></textarea></td>
                </tr>
                <!-- 
				<tr>
                  <th valign="top" nowrap>签名明文：</th>
                  <td><textarea cols="40" rows="5" readonly="readonly"><?php echo $plain;?></textarea></td>
                </tr>
                 -->
                <tr>
                  <td colspan="2"><div class="pbutton2 pline" align="center"><input type="submit" value="提交" class="button" onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $url;?>';else{return false;}"/><input type="button" value="查看代码" class="button" onClick="document.getElementById('codeDiv').style.display='block';"/></div></td>
                </tr>
              </tbody>
            </table>

			<div id="codeDiv" style="display:none">
			<table width="200" border="0">
			  <tr>
				<td>
<pre name="code" class="php" id="code">
//商户撤销接口，生成请求URL代码
	//引入API文件
  	require_once ('mer2Plat.php');
	$service=$_REQUEST['service'];
	$charset=$_REQUEST['charset'];
	$mer_id=$_REQUEST['mer_id'];
	$sign_type=$_REQUEST['sign_type'];
	$res_format=$_REQUEST['res_format'];
	$order_id=$_REQUEST['order_id'];
	$mer_date=$_REQUEST['mer_date'];
	$amount=$_REQUEST['amount'];
	$version=$_REQUEST['version'];
	$map =new HashMap();
	$map->put("service",$service);
	$map->put("charset",$charset);
	$map->put("mer_id",$mer_id);
	$map->put("sign_type",$sign_type);
	$map->put("order_id",$order_id);
	$map->put("mer_date",$mer_date);
	$map->put("res_format",$res_format);
	$map->put("amount",$amount);
	$map->put("version",$version);
	$reqData = MerToPlat::requestTransactionsByGet($map);
	$url = $reqData->getUrl();//访问该URL可实现撤销交易

//结束

</pre>
				</td>
			  </tr>
			</table>
			</div>

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