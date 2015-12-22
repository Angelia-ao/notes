
<?php
require_once 'common.php';
//SignUtil::verify("mer_date=20120110&mer_id=9995&order_id=10002417&ret_code=0000&version=4.0","LZRUM0FfsqgcCiwHXghFGKfz0+xWFPGUGNXVaj7kcJPY2iOopiIQXwsc4kIeFIc0nttIx29KCvbuPxJJ0uHU5wJbRAzxH8H8cHGMVahTny4joll9zSXatep3jSAa4RE2BovMkIxYzif6tTCf7DMAlD+dDMZ6oRJDGW7rFxJh4G0=");
$data=RSACryptUtil::decrypt("j89aEJ00lS6CfTGLjQhpZTEzobUUtFEQerqC/GfsTlPDkls8f3jlX00F/4iFckY6WI3R3ckkktiYTXiiFmc/gJ5YzfHY9EgCra0DAsp44kOd15hQ4aaENUMzWqxQUoqGQtcHDCril/litPVpOm0RD1uuGreW+UPg3VYv9QQ0G8s=","6374");
die($data);
?>

