#!/bin/bash

java_page_file=$1
java_page=`cat $java_page_file`

#====== 删除<html>上面所有行 ======
html_line=`echo "$java_page" | grep -n '<html' | head -1 | cut  -d  ":"  -f  1`
html_line_Upside=`expr $html_line - 1`
php_page_tmp=`echo "$java_page" | sed "1,${html_line_Upside}d"`
php_page_tmp=`echo -e "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n$php_page_tmp"`

#====== 修改css文件路径 ======
php_page_tmp=`echo "$php_page_tmp" | sed 's/\.\.\/\.\.\//..\//g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/shBrushJava.js/shBrushPhp.js/g'`

#====== 删除java日期订单号生成部分，增加调用php部分 ======
if [ ! -z "`echo "$php_page_tmp " |grep '<%'`" ];
then
	c_jar_first=`echo "$php_page_tmp" | grep -n '<%' | head -1 | cut  -d  ":"  -f  1`
	c_jar_last=`echo "$php_page_tmp" | grep -n '%>' | head -1 | cut  -d  ":"  -f  1`
	php_page_tmp=`echo "$php_page_tmp" | sed "${c_jar_first},${c_jar_last}d"`
	php_page_tmp=`echo "$php_page_tmp" | sed "${c_jar_first} a\
	\ \ <?php\
	\n    \\\$orderId = rand ( 100000, 999999 );\
	\n    \\\$merDate = date ( \"Ymd\" );\
	\n  ?>"`
fi

#====== 修改两个页面的引用 ======
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page="head.jsp"\/>/<?php include(".\/head.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page=".\/head.jsp"\/>/<?php include(".\/head.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page="left.jsp"\/>/<?php include(".\/left.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page=".\/left.jsp"\/>/<?php include(".\/left.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page="bottom.jsp"\/>/<?php include(".\/bottom.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page=".\/bottom.jsp"\/>/<?php include(".\/bottom.php");?>/g'`

#====== 页面部分php化 ======
php_page_tmp=`echo "$php_page_tmp" |sed -e 's/xxxx.jsp/xxxx.php/g'`
php_page_tmp=`echo "$php_page_tmp" |sed -e 's/<%=orderId %>/<?php echo $orderId;?>/g'`
php_page_tmp=`echo "$php_page_tmp" |sed -e 's/<%=date %>/<?php echo $merDate;?>/g'`

php_page_file=${java_page_file/jsp/php}
c_java_page_file=${java_page_file/1.jsp/2.jsp}
c_php_page_file=${java_page_file/1.jsp/2.php}
php_page_tmp=`echo "$php_page_tmp" |sed -e "s/$c_java_page_file/$c_php_page_file/g"`

rm -f ./$java_page_file
echo "$php_page_tmp" > ./$php_page_file
dos2unix $php_page_file >/dev/null 2>&1
chmod 644 ./$php_page_file
