<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>公共验证接口</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
    <script language="javascript" src="../common/syntaxHighlighter/js/shCore.js"></script>
    <script language="javascript" src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>
  </head>
  <body>
  <?php
        require_once ("../api/mer2Plat.php");
        $map = new HashMap();
        foreach($_REQUEST as $key => $value){
               $map->put($key,$value);
        }

        $reqData = MerToPlat::makeRequestDataByGet($map);
        $sign = $reqData->getSign();//DEMO中显示签名结果。
        $url = $reqData->getUrl();
  ?>

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

                <tr><th><strong>协议参数</strong></th></tr>
                <tr>
                  <th nowrap="nowrap">接口名称【service】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['service'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">字符编码【charset】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['charset'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">商户编号【mer_id】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['mer_id'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">签名方式【sign_type】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['sign_type'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">签名【sign】：</th>
                  <td><textarea name="sign" cols="40" rows="5" readonly="readonly"><?php echo $sign;?></textarea></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">版本号【version】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['version'];?></strong></td>
                </tr>

                <tr><th><strong>业务参数</strong></th></tr>
                <tr>
                  <th nowrap="nowrap">验证类型【auth_type】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['auth_type'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">验证模式【auth_mode】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['auth_mode'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">商户订单号【order_id】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['order_id'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">银行卡号【bank_account】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['bank_account'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">账户姓名【account_name】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['account_name'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">证件类型【identity_type】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['identity_type'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">证件号【identity_code】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['identity_code'];?></strong></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">手机号【mobile_id】：</th>
                  <td nowrap="nowrap"><strong><?php echo $_REQUEST['mobile_id'];?></strong></td>
                </tr>

                <tr>
                  <td colspan="2"><div class="pbutton2 pline" align="center">
                    <input type="submit" value="提交" class="button" onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $url; ?>';else{return false;}"/>
                    <input type="button" value="查看代码" class="button" onClick="document.getElementById('codeDiv').style.display='block';"/>
                  </div></td>
                </tr>
              </tbody>
            </table>

            <div id="codeDiv" style="display:none">
            <table width="200" border="0">
              <tr>
                <td>
                  <pre name="code" class="php" id="code">
        require_once ("../api/mer2Plat.php");
        $map = new HashMap();
        $map->put(service,'<?php echo $_REQUEST['service'];?>');
        $map->put(charset,'<?php echo $_REQUEST['charset'];?>');
        $map->put(mer_id,'<?php echo $_REQUEST['mer_id'];?>');
        $map->put(sign_type,'<?php echo $_REQUEST['sign_type'];?>');
        $map->put(version,'<?php echo $_REQUEST['version'];?>');
        $map->put(auth_type,'<?php echo $_REQUEST['auth_type'];?>');
        $map->put(auth_mode,'<?php echo $_REQUEST['auth_mode'];?>');
        $map->put(order_id,'<?php echo $_REQUEST['order_id'];?>');
        $map->put(bank_account,'<?php echo $_REQUEST['bank_account'];?>');
        $map->put(account_name,'<?php echo $_REQUEST['account_name'];?>');
        $map->put(identity_type,'<?php echo $_REQUEST['identity_type'];?>');
        $map->put(identity_code,'<?php echo $_REQUEST['identity_code'];?>');
        $map->put(mobile_id,'<?php echo $_REQUEST['mobile_id'];?>');
        $reqData = MerToPlat::makeRequestDataByGet($map);
        $url = $reqData->getUrl();

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
