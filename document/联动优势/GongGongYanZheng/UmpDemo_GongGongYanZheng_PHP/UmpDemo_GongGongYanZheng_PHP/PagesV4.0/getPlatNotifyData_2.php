<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>平台通知解析响应</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
    <script language="javascript" src="../common/syntaxHighlighter/js/shCore.js"></script>
    <script language="javascript" src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>
  </head>
  <body>
    <div id="HEADA"><?php include("./head.php");?></div>
    <div id="MAINA">
      <div class="mindexa">
        <div class="mleft">
          <?php include("./left.php");?>
        </div>
        <div class="mright">
          <h3>平台通知解析响应</h3>
          <div class="mrmain">
            <table>
              <tbody>

  <?php
    require_once ("../api/plat2Mer.php");
    require_once ("../api/mer2Plat.php");
    
    $html = $_REQUEST['html'];
    $htmlarr = explode("?",$html);

    echo "<tr>\n";
    echo '<th valign="top" nowrap>平台通知数据字符串：</th>';
    echo "\n";
    echo '<td valign="top" nowrap><textarea cols="60" rows="10" name="html">' . $htmlarr[1] . '</textarea></td>';
    echo "\n";
    echo "</tr>\n";

    $ht = new HashMap ();
    foreach(explode("&",$htmlarr[1]) as $u){
        $v=explode("=",$u);
        $ht->put ( $v[0],urldecode($v[1]) );
    }

    echo "<tr><td colspan=\"2\"><br/><b>解析后的数据如下</td></tr>";

    if (! is_null ( $ht ) && $ht->size () > 0) {
        $keys = $ht->keys ();
        for($i = 0; $i < count ( $keys ); $i ++) {
        echo "<tr>\n";
            if ($keys [$i] == "sign") {
                echo '<th valign="top" nowrap>【sign】：</th>';
                echo "\n";
                echo '<td valign="top" nowrap><textarea cols="60" rows="3" name="html">' . $ht->get ( $keys [$i] ) . '</textarea></td>';
                echo "\n";
            } else {
                echo '<th valign="top" nowrap>【' . $keys [$i] . '】：</th>';
                echo "\n";
                echo '<td valign="top" nowrap><strong>' . $ht->get ( $keys [$i] ) . '</strong></td>';
                echo "\n";
            }
        echo "</tr>\n";
        }
    }

    $resData = new HashMap ();
    try{
        $reqData = PlatToMer::getNotifyRequestData ( $ht );
        $resData->put("ret_code","0000");
    } catch (Exception $e){
        System.out.printf("验证签名发生异常" + $e);
        $resData->put("ret_code","1111");
    } 

        $resData->put ( "mer_id", $ht->get ( "mer_id" ) );
        $resData->put ( "sign_type", $ht->get ( "sign_type" ) );
        $resData->put ( "version", $ht->get ( "version" ) );
        $resData->put ( "ret_msg", "success" );

        $data = MerToPlat::notifyResponseData ( $resData );

        echo "<tr><td colspan=\"2\"><br/><b>验签成功！商户响应数据如下</td></tr>";
        echo "<tr>\n";
        echo '<th valign="top" nowrap>商户响应平台标准数据完整格式：</th>';
        echo "\n";
        echo '<td valign="top" nowrap><textarea cols="60" rows="6" readonly="readonly" name="mer2plat"><META NAME="MobilePayPlatform" CONTENT="' . $data . '" /></textarea></td>';
        echo "\n";
        echo "</tr>\n";
  ?>
              <tr>
                <td colspan="2"><div class="pbutton2 pline" align="center"><input type="button" value="查看代码" class="button" onClick="document.getElementById('codeDiv').style.display='block';"/></div></td>
              </tr>

              </tbody>
            </table>

            <div id="codeDiv" style="display:none">
            <table width="200" border="0">
              <tr>
                <td>
                  <pre name="code" class="php" id="code">
&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"&gt;
&lt;html&gt;
&lt;?php
    require_once ("../api/plat2Mer.php");
    require_once ("../api/mer2Plat.php");
    //获取联动平台支付结果通知数据（商户应采取循环遍历方式获取平台通知数据,不应采取固定编码的方式获取固定字段，
    //否则当平台通知数据发生变化时，容易出现接收数据验签不通过情况）
    $map = new HashMap();
    foreach($_REQUEST as $key => $value){
        $map->put($key,$value);
    }

    //获取UMPAY平台请求商户的支付结果通知数据,并对请求数据进行验签,此时商户接收到的支付结果通知会存放在这里,商户可以根据此处的trade_state订单状态来更新订单。
    $resData = new HashMap ();
    try{
        //如验证平台签名正确，即应响应UMPAY平台返回码为0000。【响应返回码代表通知是否成功，和通知的交易结果（支付失败、支付成功）无关】
        //验签支付结果通知 如验签成功，则返回ret_code=0000
        $reqData = PlatToMer::getNotifyRequestData ( $map );
        $resData->put("ret_code","0000");
    } catch (Exception $e){
        //如果验签失败，则抛出异常，返回ret_code=1111
        System.out.printf("验证签名发生异常" + $e);
        $resData->put("ret_code","1111");
    }

    //验签后的数据都组织在resData中。
    //生成平台响应UMPAY平台数据,将该串放入META标签，以下几个参数为结果通知必备参数，实际响应参数请参照接口规范填写。
    $resData->put ( "mer_id", $map->get ( "mer_id" ) );
    $resData->put ( "sign_type", $map->get ( "sign_type" ) );
    $resData->put ( "version", $map->get ( "version" ) );
    $resData->put ( "ret_msg", "success" );

    $data = MerToPlat::notifyResponseData ( $resData );
?&gt;

&lt;head&gt;
  &lt;META NAME="MobilePayPlatform" CONTENT="&lt;php echo $data;&gt;" /&gt;
  &lt;title&gt;result&lt;/title&gt;
&lt;/head&gt; 
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
