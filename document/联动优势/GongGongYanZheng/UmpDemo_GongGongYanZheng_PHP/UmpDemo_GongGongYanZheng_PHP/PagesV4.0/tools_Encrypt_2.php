<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>平台公钥数据加密</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
    <script language="javascript" src="../common/syntaxHighlighter/js/shCore.js"></script>
    <script language="javascript" src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>
  </head>

  <?php
    require_once ('../api/mer2Plat.php');

    $data1 = $_REQUEST ['data1'];
    $map = new HashMap ();
    $map->put ( "data1", $data1 );

    $data2 = "";
    $data2_error = "";

    if($_REQUEST ['data1']!= ""){
        $data2 = urlencode( RSACryptUtil::encrypt (iconv("UTF-8", "GBK", $data1 )));
        $data_error ="方法自动进行加密及URLencode编码";
    }else{
        $data2 = $data1;
        $data_error="加密数据为空，无任何值";
    }
?>

  <body>
    <div id="HEADA"><?php include("./head.php");?></div>
    <div id="MAINA">
      <div class="mindexa">
        <div class="mleft">
          <?php include("./left.php");?>
        </div>
        <div class="mright">
          <h3>平台公钥数据加密</h3>
          <div class="mrmain">
            <table>
              <tbody>
                <tr>
                  <th nowrap>待加密数据【data1】：</th>
                  <td nowrap><strong><?php echo $_REQUEST['data1'];?></strong></td>
                </tr>
                <tr>
                  <th valign="top" nowrap>加密结果数据【data2】：</th>
                  <td><textarea name="data2" cols="40" rows="5" readonly="readonly"><?php echo $data2;?></textarea><span>加密编码后结果</span><span>:<?php echo $data_error;?></span></td>
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

