thinkphp5.1问题记录

1. tp5无法隐藏index.php入口文件
	.htaccess文件 最后一行换成RewriteRule ^(.*)$ index.php [L,E=PATH_INFO:$1] 
2. rerw