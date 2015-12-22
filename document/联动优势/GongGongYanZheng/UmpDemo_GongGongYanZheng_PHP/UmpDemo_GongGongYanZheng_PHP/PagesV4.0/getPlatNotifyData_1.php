<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>平台通知数据解析响应</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="../common/css/public_css_ussys.css" type="text/css">
  </head>
  <body>
    <div id="HEADA"><?php include("./head.php");?></div>
    <div id="MAINA">
      <div class="mindexa">
        <div class="mleft">
          <?php include("./left.php");?>
        </div>
        <div class="mright">
          <h3>平台通知数据解析响应<span>(带*项为必填)</span></h3>
          <div class="mrmain">
            <form name="subForm" action="getPlatNotifyData_2.php" method="post" style="margin:0px">
              <table>
                <tbody>

                  <tr>
                    <th valign="top" nowrap="nowrap">平台通知数据：</th>
                    <td><textarea cols="40" rows="5" class="text" name="html" value=""></textarea> <span>* 联动平台通知的完整url</span</td>
                  </tr>

                <tr>
                  <th></th>
                  <td><div class="pbutton2 pline"><input type="submit" value="提交" class="button" /></div></td>
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
