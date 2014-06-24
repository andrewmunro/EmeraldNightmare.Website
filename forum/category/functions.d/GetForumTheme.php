         

<?php
	function GetForumTheme() {
	$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	$query= "SELECT * FROM themes WHERE active=1";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
	$CSS_LINK = $row['css_link'];
echo '<link rel="stylesheet" href="../../wow/static/css/wow.css?v4" />';
echo '<link rel="stylesheet" href="../../wow/static/local-common/css/cms/forums.css?v15" />';
echo '<link rel="stylesheet" href="../../wow/static/local-common/css/cms/cms-common.css?v15" />';
echo '<link rel="stylesheet" href="../../wow/static/css/cms.css?v4" />';
echo '<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v15" />';

}
}
