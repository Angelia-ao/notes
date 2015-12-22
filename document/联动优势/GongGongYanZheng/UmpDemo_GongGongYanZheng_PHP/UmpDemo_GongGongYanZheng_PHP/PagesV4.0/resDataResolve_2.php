<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>后台直连响应解析结果</title>
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
          <h3>后台直连响应解析结果</h3>
          <div class="mrmain">
            <table>
              <tbody>
 <?php
    require_once ('../api/plat2Mer.php');

    $html = $_REQUEST ['html'];
    $html = is_null ( $html ) ? "" : trim ( $html );

    $dataType = $_REQUEST ['dataType'];

    $data = new HashMap ();
    try {
                if ($dataType == "0")
                    $data = PlatToMer::getResDataByHtml ( $html );
                else
                    $data = PlatToMer::getResDataByMeta ( $html );
    } catch ( Exception $e ) {
        die ( "解析响应数据出错" );
    }

    if (! is_null ( $data ) && $data->size () > 0) {
        $keys = $data->keys ();
        for($i = 0; $i < count ( $keys ); $i ++) {
        echo "<tr>\n";
            if ($keys [$i] == "sign") {
                echo '<th valign="top" nowrap>【sign】：</th>';
                echo "\n";
                echo '<td valign="top" nowrap><textarea cols="60" rows="3" name="html">' . $data->get ( $keys [$i] ) . '</textarea></td>';
                echo "\n";
            } else {
                echo '<th valign="top" nowrap>【' . $keys [$i] . '】：</th>';
                echo "\n";
                echo '<td valign="top" nowrap><strong>' . $data->get ( $keys [$i] ) . '</strong></td>';
                echo "\n";
            }
        echo "</tr>\n";
        }
    }
    ?>
              </tbody>
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
