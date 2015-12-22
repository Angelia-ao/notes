#!/bin/bash

java_page_file=$1
java_page=`cat $java_page_file`

#====== 删除<html>上面所有行 ======
html_line=`echo "$java_page" | grep -n '<html>' | head -1 | cut  -d  ":"  -f  1`
html_line_Upside=`expr $html_line - 1`
php_page_tmp=`echo "$java_page" | sed "1,${html_line_Upside}d"`
php_page_tmp=`echo -e "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n$php_page_tmp"`

#====== 修改css文件路径 ======
php_page_tmp=`echo "$php_page_tmp" | sed 's/\.\.\/\.\.\//..\//g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/shBrushJava.js/shBrushPhp.js/g'`

#====== 删除调用jar包部分，增加调用php包部分 ======
c_jar_first=`echo "$php_page_tmp" | grep -n '<%' | head -1 | cut  -d  ":"  -f  1`
c_jar_last=`echo "$php_page_tmp" | grep -n '%>' | head -1 | cut  -d  ":"  -f  1`
php_page_tmp=`echo "$php_page_tmp" | sed "${c_jar_first},${c_jar_last}d"`
php_page_tmp=`echo "$php_page_tmp" | sed "${c_jar_first} a\
\ \ <?php\
\n        require_once (\"../api/mer2Plat.php\");\
\n        \\\$map = new HashMap();\
\n        foreach(\\\$_REQUEST as \\\$key => \\\$value){\
\n               \\\$map->put(\\\$key,\\\$value);\
\n        }\n\
\n        \\\$reqData = MerToPlat::makeRequestDataByGet(\\\$map);\
\n        \\\$sign = \\\$reqData->getSign();//DEMO中显示签名结果。\
\n        \\\$url = \\\$reqData->getUrl();\
\n  ?>\n"`

#====== 修改两个页面的引用 ======
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page="head.jsp"\/>/<?php include(".\/head.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page=".\/head.jsp"\/>/<?php include(".\/head.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page="left.jsp"\/>/<?php include(".\/left.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page=".\/left.jsp"\/>/<?php include(".\/left.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page="bottom.jsp"\/>/<?php include(".\/bottom.php");?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/<jsp:include page=".\/bottom.jsp"\/>/<?php include(".\/bottom.php");?>/g'`

#====== 页面部分php化 ======
php_page_tmp=`echo "$php_page_tmp" |sed '/【/{n;d}'`
page_re=(`echo "$php_page_tmp" | grep '【' | awk -F '【|】' '{print $2}'`)
for i in ${page_re[@]}
do
	php_page_tmp=`echo "$php_page_tmp" | sed "/【$i】/a\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ <td nowrap><strong><?php echo \\\$_REQUEST['$i'];?><\/strong><\/td>"`
done
php_page_tmp=`echo "$php_page_tmp" |sed -e '/【sign】/{n;d}' -e '/【URL】/{n;d}' `
php_page_tmp=`echo "$php_page_tmp" | sed "/【sign】/a\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
<td><textarea name=\"url\" cols=\"40\" rows=\"5\" readonly=\"readonly\"><?php echo \\\$sign;?></textarea></td>"`
php_page_tmp=`echo "$php_page_tmp" | sed "/【URL】/a\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
<td><textarea name=\"url\" cols=\"40\" rows=\"5\" readonly=\"readonly\"><?php echo \\\$url;?></textarea></td>"`

php_page_tmp=`echo "$php_page_tmp" | sed 's/<%=url %>/<?php echo $url; ?>/g'`
php_page_tmp=`echo "$php_page_tmp" | sed 's/class="java"/class="php"/g'`

#====== 代码示例部分 ======
Examples_line_first=`echo "$php_page_tmp" | grep -n 'id="code">' | head -1 | cut  -d  ":"  -f  1`
Examples_line_first=`expr $Examples_line_first + 1`


if [ ! -z "`echo "$php_page_tmp " |grep '</pre>'`" ];
then
	Examples_line_last=`echo "$php_page_tmp" | grep -n '</pre>' | head -1 | cut  -d  ":"  -f  1`
	Examples_line_last=`expr $Examples_line_last - 1`
	php_page_tmp=`echo "$php_page_tmp" | sed "$Examples_line_first,${Examples_line_last}d"`

	page_re=(`echo "${page_re[@]}" | sed -e 's/URL//' -e 's/ sign /  /'`)

	Examples=`\
		for i in ${page_re[@]}
		do
			echo -e "        \\\\\\\\\\\$map\\\\\\\->put($i,\'<?php echo \\\\\\\\\\\$_REQUEST\\\\\\\['$i'\\\\\\\];?>\');\\\\"
		done`

	php_page_tmp=`echo "$php_page_tmp" | sed "${Examples_line_first} i\
	\ \n        require_once (\"../api/mer2Plat.php\");\
	\n\n        \\\$map = new HashMap();\
	\n\${Examples}
	\n        \\\$reqData = MerToPlat::makeRequestDataByGet(\\\$map);\
	\n        \\\$url = \\\$reqData->getUrl();\
	\n"`
fi

php_page_file=${java_page_file/jsp/php}
rm -f ./$java_page_file
echo "$php_page_tmp" > ./$php_page_file
dos2unix $php_page_file >/dev/null 2>&1
chmod 644 ./$php_page_file



