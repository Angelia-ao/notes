<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>url编码/解码</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
    <script language="javascript" src="../common/syntaxHighlighter/js/shCore.js"></script>
    <script language="javascript" src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>
  </head>

  <?php
    $data_e = $_REQUEST ['data_e'];
    $data_d = $_REQUEST ['data_d'];

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

                <tr><th><strong>url编码</strong></th></tr>
                <tr>
                  <th valign="top" nowrap="nowrap">需编码url【data_e】：</th>
                  <td><textarea name="sign" cols="40" rows="3" readonly="readonly"><?php echo $data_e;?></textarea></td>
                </tr>
                   <tr>
                  <th valign="top" nowrap="nowrap">编码后的url【data_encode】：</th>
                  <td><textarea name="sign" cols="40" rows="3" readonly="readonly"><?php echo $data_encode;?></textarea></td>
                </tr>
                
                <tr><th><strong>url解码</strong></th></tr> 
                <tr>
                  <th valign="top" nowrap="nowrap">需解码url【data_d】：</th>
                  <td><textarea name="sign" cols="40" rows="3" readonly="readonly"><?php echo $data_d;?></textarea></td>
                </tr>
                   <tr>
                  <th valign="top" nowrap="nowrap">解码后的url【data_decode】：</th>
                  <td><textarea name="sign" cols="40" rows="3" readonly="readonly"><?php echo $data_decode;?></textarea></td>
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
