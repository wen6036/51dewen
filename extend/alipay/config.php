<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091800543552",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAyPvrt2bxmJ6BrpU56M21lNQRm6DetLvDSXm9TDaCOeuwXK+Ux0tfAtB9g4sy9WHxWKkusmlj9PAwMSdRijST5IpxOeJdRIZhlQhkb7ORvhfD7ut5H7YpbW42tsFTFuU5T1xLDkHCnx02UEFp5dWy35pnN204GwHAmMCFKsdFyE3AU5Vc/CgC4kTbSnVqUHum9iHpvNYeupVPrhk2P3vOQHZH+O3o/++TvBXBbYu+OA0Idi1H2JAXqwXTqW0BDxBBqGijJCQy7OCGwvIEJJ/UFn+E/ESJjb4FQK7S1AdxnhNWGSR1cQPNtoenE9H2yEQPzX9adIesqfgLA/ntC2ga2QIDAQABAoIBAAZFfiR57N4DTC6jb2wpRxo+x9HgYjKnjT90sgh3xvaBuT4bKHxTiMJwuQnqxQtNJBfNJ6zfhwP0nrxZ6rxySY8fFstkmd5yhwb8fQ3TP5/749xHsr7fk0lb4A8x1yLmwjQMwDbQrH8EjVZRxDkswukhS0k6ej61fkoF7+HW2AGZBVecu4hI2dapjwg6H8cgOVLD9sOcGswA/1lbmLcuTF5LjT7grLvFhDKi1lalhs4iplHcn83uAUHDajco3QGzyoouCOI4OzOpYFaQlHr6ir70201LNecpvNyiwn8UJY5UbpA8Ye7zZ0MsxDeqDaIk6njtysoUjv6TOyE23F+uxpECgYEA54UViZYHwwHgfM9YUA7FOkdADdLHcOja7dQ9IkRVL83pJDWlcRPpkOwZPySHiLJwx69Es1fp6+Pc3De+Z2m3IcG3Y2o7XPqKWIRqsWryV+M7LMy2iSLmEdDhh4JgyQx6+jFdag3U55nc6Gc/6qZ1RT6q0lQ+xLN7qLnBANEbc10CgYEA3jxGmU/LnDKWewyusLIghhjAXmiiWC4jngUOBFxqpmKJsSqRv9i2xhRVBEpJANyuWP+fo9Srx+kgNNZR0Yg0qnuWs71Ga43eAS+EUCbVtBhG8OQBRVi8qGe2Xn4CtsetBxKY1KP8bFyBwsBQyiK9kF35vxj7CF5cH6L6ggESaa0CgYEAtbvt8BZo+VZb1R0dgZpWjyymxzMRgzwFvnK/mkpxZBkKTXYe6+hpi20JVFtkWJVZmiWmk/EKmjQ/hk3rlFmTe1gIkG0vNAkm19z5s1Lz8LFaHgyDrJpMZufEYQ6i0q6NSh+96CX7XeGVWojRz2vi2fwbMwcWTmllREiri+yY07ECgYEAvEjrM5dElajSj5w2ISQ5pAMycIpMCVPF/2qe7pjyDtfrervrUlQkvnuZcBIT+fP+jw68TUyw4aWlEL8IAPNaU5p0GwJguF0w22ZLvrC4XGY5LHywivVcmX2NKE+wsvVHpndeHsJ06cYSdlMD385BNyA3qW1bukJf4LnvbdfEpt0CgYBiBKgnETdtdle81caC9GdaRWt8LGoZgY1SzadxRXg5uJ6xNlFg5o4ioedyIOHkUlQKufi80Ey3hCYnVKU5WeLCtRkXrQxvghl+sFsWswRUZkQbMjsGfegsBgbi6B+1PXt/bgiyCWT2mVy0jvd0rH+2gmfPewBhT6F4rpv2zJyzLQ==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://111.230.11.122",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyJVAENU7S6SQVHMcK4pnTr7Ak1IRmZ0UTfh0r3T9mv1sWyTsu6zn/jh3yzG4ejM4F/CGZ4YIRVF4gsnm78xH7D8N34DAh61FyqRsPCc08TSo55XkUPdSze/AsmUoowXCvzZfuz5xfVSk3szKdISQkT+UKxoKRkT3RFKBLgdfP54duj/wdkvkDEHcHfIm1FR1XUsg54w0Ne8X99I3UVuRN8GzPiUUO8upE3EhqI5Zkmrn4Dq2u6ffSyKpNkgUeVknst/bCShYr1NogDxL3Wyijc+jJhWJBncFjUbx/y55Dt2+Z7T1A6opLbSdBZyCkjOwUtHtl9UcrkKGUue+5mPRgQIDAQAB",
);