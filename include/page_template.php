<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="/styles/style.css?ver=1" />
    <link rel="icon" href="/favicon.ico?ver=1" />
</head>

<body>

    <div class="banner">
    	<h1 class="banner__title">My Website</h1>
    </div>

    <div class="page">
    
    	<?php
        require($page);
    	?>
    	
    </div>
    
</body>
</html>
