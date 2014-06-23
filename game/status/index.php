<?php
require_once("../../configs.php");
include_once("functions.d/GetGameTheme.php");
$page_cat = "game";
?>
<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - <?php echo $status['status']; ?></title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="<?php echo $website['root'];?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<?php GetGameTheme(); ?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="<?php echo $website['root']; ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo $website['root']; ?>wow/static/local-common/js/core.js?v15"></script>
<script src="<?php echo $website['root']; ?>wow/static/local-common/js/tooltip.js?v15"></script>
<script src="http://static.wowhead.com/widgets/power.js"></script>
<style type="text/css">
.Good {text-shadow: 0 1px 0 green, 0 0 3px green, 0 0 3px green, 0 0 8px green, 0 0 8px green; margin-top:3px;}
.Chars {text-shadow: 1px 2px 6px #004;}
.Shadow {text-shadow:0px 0px 10px #444;}	  	
</style>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-gb game-index"><div id="predictad_div" class="predictad" style="display: none; left: 788px; top: 104px; width: 321px; "></div>
<div id="wrapper">
<?php include("../../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
	<a href="<?php echo $website['root']; ?>" rel="np"><?php echo $website['title']; ?></a>
	<span class="breadcrumb-arrow"></span>
</li>
<li class="last"><a href="" rel="np"><?php echo $Status['RealmStat']; ?></a></li>
</ol>
</div>
<div class="content-bot">
	<div class="content-header">
		<h2 class="header "><?php echo $Status['RealmStat']; ?></h2>
		<p class="desc"><?php echo $Status['Stat1']; ?><a href="forum/category/?f=27"><?php echo $Status['ServStat']; ?></a><?php echo $Status['Stat2']; ?></p>
	    <span class="clear"><!-- --></span>
	</div>
	<div id="realm-status">	
<?php include("../../functions/status_nav.php"); ?>
<div class="filter-toggle">
			<a href="javascript:;" class="selected" onclick="RealmStatus.filterToggle(this)">	</a>
		</div>
	<span class="clear"><!-- --></span>
		<div id="realm-filters" class="table-filters">
			<form action="#">
				<div class="filter">
					<label for="filter-status"><?php echo $Status['Status']; ?></label>
					<select id="filter-status" class="input select" data-filter="column" data-column="0">
						<option value=""><?php echo $Status['All']; ?></option>
						<option value="up"><?php echo $Status['Up']; ?></option>
						<option value="down"><?php echo $Status['Down']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-name"><?php echo $Status['RealmName']; ?></label>
					<input type="text" class="input" id="filter-name" data-filter="column" data-column="1" />
				</div>
				<div class="filter">
					<label for="filter-type"><?php echo $Status['Type']; ?></label>
					<select id="filter-type" class="input select" data-filter="column" data-column="2">
						<option value=""><?php echo $Status['All']; ?></option>
						<option value="pve">PvE</option>
						<option value="rppvp">RP PvP</option>
						<option value="pvp">PvP</option>
						<option value="rp">RP</option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-population"><?php echo $status['population']; ?></label>
					<select id="filter-population" class="input select" data-filter="column" data-column="3">
						<option value=""><?php echo $Status['All']; ?></option>
							<option value="high"><?php echo $status['high']; ?></option>
							<option value="medium"><?php echo $status['medium']; ?></option>
							<option value="n/a">N/A</option>
							<option value="low"><?php echo $status['low']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-locale">Locale</label>
					<select id="filter-locale" class="input select" data-column="4" data-filter="column">
						<option value=""><?php echo $Status['Locale']; ?></option>
						<option value="spanish"><?php echo $Status['spanish']; ?></option>
						<option value="german"><?php echo $Status['german']; ?></option>
						<option value="french"><?php echo $Status['french']; ?></option>
						<option value="tournament"><?php echo $Status['tournament']; ?></option>
						<option value="russian"><?php echo $Status['russian']; ?></option>
						<option value="english"><?php echo $Status['english']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-queue"><?php echo $Status['Queue']; ?></label>
					<input type="checkbox" id="filter-queue" class="input" value="true" data-column="5" data-filter="column" />
				</div>
				<div class="filter" style="margin: 5px 0 5px 15px">
					<button class="ui-button button1 " type="button" id="filter-button" onclick="RealmStatus.reset();" >
						<span>
							<span><?php echo $Status['Reset']; ?></span>
						</span>
					</button>
				</div>
	            <span class="clear"><!-- --></span>
			</form>
		</div>
	</div>
	<span class="clear"><!-- --></span>
<div id="all-realms">
	<div class="table full-width">
		<table>
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['Status']; ?></span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['RealmName']; ?></span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['Information']; ?></span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['Type']; ?></span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['Population']; ?></span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['Locale']; ?></span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow"><?php echo $Status['OnNow']; ?></span></a></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$icon = array(
						0 => 'PvE',
						1 => 'PvP',
						4 => 'PvE',
						6 => 'RP',
						8 => 'RP-PVP',
						16 => 'FFA_PVP',
					);
							
					$timezone = array(
                        0 => 'Europe',
						1 => 'Development',
						2 => 'United States',
						3 => 'Oceanic',
						4 => 'Latin America',
						5 => 'Tournament',
						6 => 'Korea',
						7 => 'Tournament',
						8 => 'English',
						9 => 'German',
						10 => 'French',
						11 => 'Spanish',
						12 => 'Russian',
						13 => 'Tournament',
						14 => 'Taiwan',
						15 => 'Tournament',
						16 => 'China',
						17 => 'CN1',
						18 => 'CN2',
						19 => 'CN3',
						20 => 'CN4',
						21 => 'CN5',
						22 => 'CN6',
						23 => 'CN7',
						24 => 'CN8',
						25 => 'Tournament',
						26 => 'Test Server',
						27 => 'Tournament',
						28 => 'QA Server',
						29 => 'CN9',
					);
							
					$population = array(
						0 => $status['low'],
						1 => $status['medium'],
						2 => $status['high'],
						3 => $status['newP'],
						4 => $status['new']
					);
					$get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` ASC");
					while($realm = mysql_fetch_array($get_realms)){
					
					$host = $realm['address'];
					$world_port = $realm['port']; 
					$world = @fsockopen($host, $world_port, $err, $errstr, 2);
					
					echo'
					<tr class="row1">
						<td class="status" data-raw="up">';	
							if($world) echo '<div class="status-icon up" onmouseover="Tooltip.show(this, \'Online\')"></div>';
							else echo '<div class="status-icon down" onmouseover="Tooltip.show(this, \'Offline\')"></div>';
							echo'
						</td>
						<td class="name">
							<a data-tooltip="'.$Status['ClickOnline'].'" href="online.php?realm='.$realm['id'].'">	 	
							<font size="2"><h3 class="Chars">'.$realm['name'].'</h3></font>';
							echo'
							</a>
						</td>
						
						<td class="name">
							<a href="statistics.php?realm='.$realm['id'].'">
								<span class="icon-frame frame-18 " style="background-image: url(http://eu.media.blizzard.com/wow/icons/18/inv_scroll_12.jpg);"></span>
								'.$Status['Statistics'].'
							</a>
						</td>
						
						<td class="type" data-raw="'.@$icon[$realm['icon']].'"><span class="'.@$icon[$realm['icon']].'">('.@$icon[$realm['icon']].')</span></td>
						<td class="population" data-raw="'.$population[$realm['population']].'"><span class="'.$population[$realm['population']].'">'.$population[$realm['population']].'</span></td>
						<td class="locale">'.$timezone[$realm['timezone']].'</td>
						<td class="queue" data-raw="false">';
							
							$max_online="500";
							
							print'
								<div style="width:100px; height:23px; position:relative;margin-left:5px;text-align:left; background-repeat:repeat-x;">
								<div style="position:absolute; z-index:50; width:100%; height:21px; text-align:center;color:white;">
								<div style="margin-top:1px;">
							';
							
							$realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.realms WHERE realmid = '".$realm['id']."'"));
							$characters = $realm_extra['char_db'];
							$world = $realm_extra['world_db'];
							
							@$sql = "SELECT SUM(online) FROM $characters.characters";
							@$sqlquery = mysql_query($sql) or die(mysql_error());
							@$memb = (int) mysql_result($sqlquery,0,0);

							echo '<h3 class="Good"> '.$memb.' '.$status['chars'].'</h3>';
							$number = $memb / $max_online;
							$total_number = $number * '100';
							
							echo '</div></div>';
							echo '<div style="width:' . $total_number . '%; background:#10AA00; background-repeat:repeat-x; height:22px;border-right:1px solid #6cc02c;">
							</div></div>';

							echo'
						</td>
					</tr>';
					}

					?>
					<tr class="no-results" style="display: none">
					<td colspan="6"><?php echo $status['noResults']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<script type="text/javascript" src="../wow/static/local-common/js/search.js?v46"></script>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '//eu.battle.net';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {0}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
other: 'Other'
}
};
//]]>
</script>
<?php include("../../footer.php"); ?>
</body>
</html>