         

<?php
	function GetGameTheme() {
	$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	$query= "SELECT * FROM themes WHERE active=1";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
	$CSS_LINK = $row['css_link'];
	echo '<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-game-site.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow.css">';
	echo '<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/lightbox.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/game/game-index.css"/>';
	echo '<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wiki/wiki.css"/>';
	
}
}
