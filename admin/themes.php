<?php
include("../configs.php");
	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT gmlevel from account where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
	
  mysql_select_db($server_db) or die (mysql_error());
  $sql = mysql_query("SELECT id FROM news");
  //PAGINATION BEGIN
  $size=10; 
  $num_r = mysql_num_rows($sql);
  $num_p = ceil($num_r / $size);
  //Look for the number page, if not then first
  if (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] < 1) {   //More control for 'go to' textbox
    $page=1;
  } 
  elseif ($_GET['page'] > $num_p){ //If overflow the show last page
    $page = $num_p;
  } 
  else{
    $page = $_GET['page'];  
  }
  $start = ($page - 1) * $size;  //the first result to show
  //PAGINATION END
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title>AquaFlame CMS Admin Panel</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
		<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select").uniform();
      });
    </script>
	<script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
	</script>
	<script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);
	</script>
	<script type="text/javascript">
	$(document).ready(function()
{
   $( '#checkall' ).live( 'click', function() {
				
				$( '.chkl' ).each( function() {
					$( this ).attr( 'checked', $( this ).is( ':checked' ) ? '' : 'checked' );
				}).trigger( 'change' );
 
			});
  $('#checkall').click(function(){

 $('span').toggleClass('checked');
$('#checkall').toggleClass('clicked');

 }); 
	});
	</script>
</head>
<body class="bgc">
	<div id="admin">
    <div id="wrap">
      <div id="head">
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
		  <img src="images/sepLine.png" alt="" class="sepline" />
    <div class="datalist"> 
	     <div class="heading">
        <h2>Themes</h2>
		<a href="install_Theme.php">Install Theme</a>
        <select name="sort">
          <option>Sort By</option>
          <option>Option1</option>
          <option>Option2</option>
        </select> 
      </div>
      <div class="pagination">
        <?php
          if ($num_p > 1){
         if ($page > 1){echo '<a href="viewnews.php?page='.($page-1).'" style="color:#43ACFB;text-decoration:none;">Prev. </a>|';}
         if ($page > 2){echo '<a href="viewnews.php?page=1" style="color:#43ACFB;text-decoration:none;"> 1 </a>...';}
         echo $page;
         if ($page < $num_p-1){echo '...<a href="viewnews.php?page='.$num_p.'" style="color:#43ACFB;text-decoration:none;"> '.$num_p.' </a>';}
         if ($page < $num_p){echo '|<a href="viewnews.php?page='.($page+1).'" style="color:#43ACFB;text-decoration:none;"> Next</a>';}
         echo'
          <form method="get" action="">
            <input type="hidden" name="sort" value="'.$_GET['sort'].'">
            <input type="hidden" name="type" value="'.$_GET['type'].'">
            <input type="text" name="page" maxlength="4" class="pag"/>
            <input type="submit" value="Go">
          </form>'; 
         }
        ?> 
      </div>
      <ul id="lst">
        <li>
          <div class="chk"><a id="checkall"></a> </div>
			    
          <p class="title"><strong>Title</strong></p>
          <p class="descripHead">Description</p>
          <p class="incHead">Creation Date</p>
        </li>
           <?php
            mysql_select_db($server_db) or die (mysql_error());
            $result = mysql_query("SELECT * FROM themes");
            while ($theme = mysql_fetch_assoc($result)){
			  echo'
            <li>
            <div class="chk">
              <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
            </div>
           
            <p class="title"><a href="viewtheme.php?id=' .$theme['id']. '">'.substr(strip_tags($theme['name']),0,16).'</a> </p>
	
	
			
            <p class="descrip">'.substr(strip_tags($theme['description']),0,90).' ...</p>
            <p class="inc">'.$theme['creation_date'].'</p>';

	if($theme['active']=='1') {
			echo "<p class='inc'><font color='green'>Active</p>";
					}


            echo '</li>';
            }?>
      </ul>
    </div>
<?php
$version="3";
	/* Checks for updates using a remote CSV file
	 * The CSV must be like this
	 * versionnumber,versiondescription,type,downloadlink
	 * For the type, critical is 1 none critical is 0
	 * 
	 */

	//Version of the script, to check against CSV
	$critical = FALSE; //Set Critical Variable to False
	$update = FALSE; //Set None Critical to Fasle too


	$url = "http://logon.doxramos.org/theming/version.csv"; //Link to your external CSV to check against
$fp = @fopen ($url, 'r') or print ('UPDATE SERVER OFFLINE'); //If the server is unreachable
	$read = fgetcsv ($fp); //PHP fgetcsv
	fclose ($fp); // Closes the connection
if ($read[0] > $version && $read[2] == "1") { $critical = TRUE; } // If its 1, set ciritcal to true
	if ($read[0] > $version) { $update = TRUE; } // Anything other than 1 set update to true
	if ($critical) {
		print '<font color="red">Version '.$read[0].' of The Theme Manager is Now Available. Please Update using git pull or reclone</font>';
	}else if ($update){
		print '<font color="green">There is a none critical update available!</font><br/>You can get it at <a href="'.$read[3].'">'.$read[3].'</a> (Version: '.$read[1].') <br/><br/>';
	}
	else {
		print 'Your Version of AquaFlame Theme Manager is Up to date';
		}
  
?>

    <img src="images/sepLine.png" alt="" class="sepline" />
             <!--  <div class="messages">
        <div><img src="images/warningIco.png" alt="" />
                  <p>Warning Message, Lorem ipsum dolor sit amet, consectetur adipiscing elit Pellentesque quis.</p>
                </div>
        <div><img src="images/infoIcon.png" alt="" />
                  <p>Information Message, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
        <div><img src="images/success.png" alt="" />
                  <p>Success Message, Lorem ipsum dolor sit amet, Nam bibendum sagittis lobortis.consectetur.</p>
                </div>
        <div><img src="images/errorIco.png" alt="" />
                  <p>Error Message, Lorem ipsum dolor sit amet, Nam bibendum sagittis lobortis.consectetur.</p>
                </div>
      </div> -->
              <div id="calen">
        <div id="yuicalendar1"></div>
      </div>
            </div>
  </div>
          <div class="push"></div>
        </div>
<?php include("footer.php"); ?>
</body>
</html>
