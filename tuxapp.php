<?
session_start();
$microtime = microtime();
include("inc/core/config.php");
include("inc/core/core.php");



echo "P&aacute;gina carregada em ";
print (number_format($microtime,2));
echo " segundos";
