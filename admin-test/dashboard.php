<?php
include("../configs.php");
mysql_select_db($server_adb);
$check_query = mysql_query("SELECT gmlevel from account where username = '" . strtoupper($_SESSION['username']) . "'") or die(mysql_error());
$login = mysql_fetch_assoc($check_query);
if ($login['gmlevel'] < 3) {
    die('
<meta http-equiv="refresh" content="0;url=wrong.php"/>
		');
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flame.NET - Dashboard</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="../wow/static/local-common/images/wow.png">
  <!---CSS Files-->
  <link rel="stylesheet" href="css/core.css">
  <link rel="stylesheet" href="css/ui.css">
  <link rel="stylesheet" href="css/style.css">
  <!---jQuery Files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/inputs.js"></script>
  <script src="js/flot.js"></script>
  <script src="js/functions.js"></script>
</head>
<body>

  <div id="wrapper">

    <!--USER PANEL-->
	<?php 	$login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '" . mysql_real_escape_string($_SESSION["username"]) . "'");
			$login2 = mysql_fetch_assoc($login_query);
      $joindate = date("d.m.Y ", strToTime($login2['joindate']));
	
			$uI = mysql_query("SELECT avatar FROM $server_db.users WHERE id = '" . $login2['id'] . "'");
			$userInfo = mysql_fetch_assoc($uI);
	?>
    <div id="usr-panel">
      <div class="av-overlay"></div>
      <img src="<?php echo $website['root']; ?>images/avatars/2d/<?php echo $account_extra['avatar']; ?>" id="usr-av">
      <div id="usr-info">
        <span id="usr-name"><?php echo $account_extra['firstName']; ?></span><span id="usr-role">Administrator</span>
        <button id="usr-btn" class="orange" data-modal="#usr-mod #mod-home">User CP</button>
      </div>
    </div>

    <!--NAVIGATION-->

    <div id="nav">
      <ul>
        <li class="active"><span class="icon">H</span>Dashboard</li>
        <li><a href="news.php"></a><span class="icon">&lt;</span>News</li>
        <li><a href="forum.php"></a><span class="icon">P</span>Forum</li>
        <li><a href="media.php"></a><span class="icon">F</span>Media</li>
        <li><a href="users.php"></a><span class="icon">G</span>Users</li>
		<li><a href="#"></a><span class="icon">L</span>Themes</li>
        <li><a href="#"></a><span class="icon">K</span>CMS Info</li>
		<li><a href="../"></a><span class="icon">N</span>View Website</li>
        <li data-modal="#usr-mod #mod-set" id="set-btn"><span class="icon">)</span>Settings</li>
        <li id="logout"><a href="logout.php"></a><span class="icon icon-grad">B</span>Log Out</li>
      </ul>
      <br class="clear">
    </div>

    <!--BEGIN MAIN CONTENT-->
	<div id="content" class="dashboard-page">
	<!-- News Section -->
	<div class="box g16">
        <h2 class="box-ttl">LATEST NEWS</h2>
        <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><li class="">10</li><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div><div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;">TITLE</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;">AUTHOR</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;">DESCRIPTION</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;">COMMENTS</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 0px;">FUNCTIONS</th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
		  <?php
                            mysql_select_db($server_db) or die(mysql_error());
                            $news = mysql_query("SELECT id,author,content,title,comments FROM news ORDER BY date DESC LIMIT 5");
                            while ($fcheck2 = mysql_fetch_assoc($news)) {
                            echo'
								<tr class="gradeX odd">
								<td class=" sorting_1">' . substr(strip_tags($fcheck2['title']), 0, 36) . '...</td>
								<td class=" ">' . $fcheck2['author'] . '</td>
								<td class=" ">' . substr(strip_tags($fcheck2['content']), 0, 36) . '...</td>
								<td class="center "> ' . $fcheck2['comments'] . '</td>
								<td class="center "><a href="edtnews.php?id=' . $fcheck2['id'] . '">
								<button class="btn-m has-icon">
								<span class="icon">U</span>EDIT</button></a>
								<a href="dltnews.php?id=' . $fcheck2['id'] . '">
								<button class="btn-m red has-icon">
								<span class="icon2">X</span>DELETE</button></a></td>
								</tr>';
								}
                  ?>
				</tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div></div>
		<!-- Forum Threads -->
		<div class="box g16">
        <h2 class="box-ttl">LATEST FORUM POSTS</h2>
        <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><li class="">10</li><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div><div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;">TITLE</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;">AUTHOR</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;">DESCRIPTION</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;">COMMENTS</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 0px;">FUNCTIONS</th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
		  <?php
                            mysql_select_db($server_db) or die(mysql_error());
                            $forum = mysql_query("SELECT id,name,author,content,replies,views FROM forum_threads ORDER BY date DESC LIMIT 5");
                            while ($fcheck = mysql_fetch_assoc($forum)) {
                                echo'
								<tr class="gradeX odd">
								<td class=" sorting_1">' . substr(strip_tags($fcheck['name']), 0, 36) . '...</td>
								<td class=" ">' . $fcheck['author'] . '</td>
								<td class=" ">' . substr(strip_tags($fcheck['content']), 0, 36) . '...</td>
								<td class="center "> ' . $fcheck['replies'] . '</td>
								<td class="center "><a href="edtnews.php?id=' . $fcheck['id'] . '">
								<button class="btn-m has-icon">
								<span class="icon">U</span>EDIT</button></a>
								<a href="dltnews.php?id=' . $fcheck['id'] . '">
								<button class="btn-m red has-icon">
								<span class="icon2">X</span>DELETE</button></a></td>
								</tr>';
								}
                  ?>
				</tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div></div>
	 

	<div id="users-cont" class="box g16 row1"> <!--USERS LIST-->
        <div class="scroll">
          <ul class="scroll-cont ul-grad">
		  <?php
                            mysql_select_db($server_db) or die(mysql_error());
                            $users = mysql_query("SELECT U.id,U.firstName,U.lastName,U.birth,username FROM users U, $server_adb.account A
            WHERE A.id = U.id ORDER BY id DESC LIMIT 6");
                            while ($usercheck = mysql_fetch_assoc($users)) {
                                mysql_select_db($server_cdb) or die(mysql_error());
                                $chars = mysql_query("SELECT name FROM characters WHERE account = '" . $usercheck['id'] . "'");
                                echo '<li><span>' . $usercheck['username'] . '</span><span class="users-role">' . $usercheck['firstName'] . ' ' . $usercheck['lastName'] . '</span></li>';
                                while ($charcheck = mysql_fetch_assoc($chars)) {
                                }
                                
                            }
                            ?>
          </ul>
        </div>
        <div class="btn-set-btm full">
          <button id="add-usr" class="black has-icon"><span class="icon">a</span>Add new user</button>
          <button id="mng-usr" class="black has-icon"><span class="icon">C</span>Manage users</button>
        </div>
      </div>
       <div id="grid-cont" class="full">
        <div class="box g16"><span><center>All rights reserved. | Powered by: <a style="color: #CE9109;" href="http://aquaflame.org">AquaFlame CMS</a></center></span></div>
      </div>
	</div><!--END MAIN CONTENT-->
    <!--MODAL WINDOWS-->

    <div id="modal-ov">
      <div class="modal" id="usr-mod">
        <div class="mod-ttl"><h2>USER CONTROL PANEL</h2></div>
        <div class="mod-body">
          <div id="mod-home" class="nav-item show">
            <div class="av-overlay"></div>
            <img src="<?php echo $website['root']; ?>images/avatars/2d/<?php echo $account_extra['avatar']; ?>">
            <ul id="usr-det">
              <li><p><span>Name: </span><?php echo $account_extra['firstName'] . ' ' . $account_extra['lastName']; ?></p></li>
              <li><p><span>Role: </span>System Administrator</p></li>
              <li><p><span>Contact: </span><?php echo $login2['email']; ?></p></li>
              <li><p><span>Member since: </span><?php echo $joindate; ?></p></li>
              <li><p><span>Last IP: </span><?php echo $login2['last_ip']; ?></p></li>
            </ul>
          </div>
          <div id="mod-msg" class="mod-conv nav-item">
            <div class="scroll">
              <ul class="conv no-av scroll-cont">
                <span class="conv-info">Conversation with Mike - 9.20 AM</span>
                <li class="msg received">
                  <div class="message"><p><span class="msg-info">Mike, 1 hour ago</span>
                  Hey, can I borrow 6 grand til' tomorrow? Some mobster says he's going to cut off my toes if I don't pay him back. Thanks dude!</p></div>
                </li>
                <li class="msg sent">
                  <div class="message"><p><span class="msg-info">Sent 30 minutes ago</span>
                  Of course I'll lend you some money, I'm sure you'll pay me back. ;)</p></div>
                </li>
                <li class="msg received">
                  <div class="message"><p><span class="msg-info">Mobsters, 15 minutes ago</span>
                  We got your boy. If you want him to mooch off you ever again, bring $50,000
                  cash to the warehouse on 3rd and Lincoln. No cops.</p></div>
                </li>
              </ul>
              <form class="conv-text">
                <input type="text" class="conv-input" placeholder="Type in your message...">
                <button class="conv-btn">Send</button>
              </form>
            </div>
          </div>
          <div id="mod-notif" class="nav-item">
            <div class="notif green no-coll expanded full">
              Welcome to Flame Admin!<span class="icon">=</span>
              <p class="nt-det">Feel free to look around, there is much to see.</p>
            </div>
            <div class="notif red full">
              If a paperclip offers to help, please alert the authorities.
              <span class="icon">X</span>
            </div>
          </div>
          <div id="mod-set" class="nav-item">
            <input type="text" class="g4" placeholder="First name" value="<?php echo $account_extra['firstName']; ?>">
            <input type="text" class="g4" placeholder="Last name" value="<?php echo $account_extra['lastName']; ?>">
            <input type="text" class="g8 last" placeholder="E-mail" value="<?php echo $login2['email']; ?>">
            <button class="g8">Change Password</button>
            <button class="g8 last">Change Email</button>
            <div class="g8 cont">
              <input type="checkbox" class="chbox g4" checked>
              <div class="label g12 last"><span>Remember login details</span></div>
            </div>
            <div class="g8 cont last">
              <input type="checkbox" class="chbox g4" checked>
              <div class="label g12 last"><span>Toggle this checkbox</span></div>
            </div>
            <div class="g8 cont">
              <input type="checkbox" class="chbox tgcls g4" data-tgcls="#wrapper hz-nav">
              <div class="label g12 last"><span>Horizontal navigation</span></div>
            </div>
            <div class="g8 cont last">
              <input type="checkbox" class="chbox g4">
              <div class="label g12 last"><span>God Mode</span></div>
            </div>
          </div>
        </div>
        <div class="mod-act">
          <ul class="mod-nav">
            <li class="sel" data-nav="#mod-home"><span class="icon">H</span></li>
            <li data-nav="#mod-msg"><span class="icon">2</span></li>
            <li data-nav="#mod-notif">
              <span class="icon">A</span><div class="unread-ind">2</div>
            </li>
            <li data-nav="#mod-set"><span class="icon">U</span></li>
          </ul>
          <button class="orange close">Close</button>
        </div>
      </div>
    </div>

  </div><!--END WRAPPER-->

  <span id="load">
    <img src="img/load.png"><img src="img/spinner.png" id="spinner">
  </span>

  <!---jQuery Code-->
  <script type='text/javascript'>

    // LOAD FUNCTIONS

    $.fn.loadfns( function() {
      $('#calendar').calEvents();
      $('#ind-cont #nbill').removeClass('init');
      if ($('#ind-cont').width() < 500) $('#ind-cont').find('.pie-desc').addClass('overlay');
      $(window).resize( function() {
        if ($('body').children('#toast-container').length < 1)
          toastr.info('If content goes out of place when resizing, just hit refresh');
      });
    });

    // CHART PLOTTING

    var d1 = [[0,10], [2,7], [4,10], [6,16], [8,19], [10,23], [12,30], [14,35], [16,40], [18,46], [20,54]];
        d2 = [[4,0], [8,7], [10,12], [14,14], [16,18], [18,16], [20,20]];
    $.plot($("#front-chart"), [ { data: d1, color: "#f0a602" }, { data: d2, color: "#71a100" } ], {
      series: {
        lines: { show: true, fill: true },
        points: { show: true },
        resize: false },
      xaxis: { ticks: false },
      yaxis: { ticks: false },
      grid: { borderWidth: 0, hoverable: true }
    });

    // USERS TABLE

    $.fn.sortusers = function() {
      $('#users-cont ul li .sort-handle').remove();
      $('#users-cont ul li:not(".generated")').append('<div class="icon dark sort-handle">c</div>');
      $('#users-cont ul').sortable({
        placeholder: 'sort-placeholder',
        handle: 'div.sort-handle',
        containment: 'parent',
        axis: 'y'
      }).children('li:not(".generated")').disableSelection();
    };
    $.fn.sortusers();

    $.fn.usersnr = function() {
      var children = $('#users-cont .scroll ul').children('li').length;
      if (children > 6) {
        $('#users-cont .scroll').addClass('scroll-active').nanoScroller({ scroll: 'bottom' });
      } else {
        $('#users-cont .scroll').removeClass('scroll-active').nanoScroller({ stop: true });
        $('#users-cont .scroll-cont').removeAttr('style');
      };
    };

    $('#add-usr').click( function() {
      $('#users-cont ul').append('<li class="generated"><span><input type="text" class="name-input" placeholder="Name *"></span><span class="users-role"><input type="text" class="role-input" placeholder="Role"></span><span class="icon cancel">X</span><span class="icon accept">=</span></li>');
      $('.name-input').focus();
      $.fn.usersnr();
      $('.generated span.icon.accept').click( function() {
        var nameval = $(this).parents('.generated').find('.name-input').val();
            roleval = $(this).parents('.generated').find('.role-input').val();
        if (nameval.length > 0) {
          $(this).parents('.generated').html('<span>'+nameval+'</span><span class="users-role">'+roleval+'</span>').removeAttr('class');
          $.fn.sortusers();
          toastr.options = { timeOut: 4000 };
          toastr.success('New user created successfully.','Hooray');
        } else { $('.name-input').focus() };
      });
      $('.generated span.icon.cancel').click( function() {
        $(this).parents('.generated').animate({ height:'0', opacity:'0'}, 400, function() {
          $(this).remove();
          $.fn.usersnr();
        });
      });
    });

    // DONUT INDICATORS

    $('#pie-1').knob({ 'readOnly': true, 'bgColor':'rgba(255,255,255,0.04)','fgColor':'#d6960b' });
    $('#pie-2').knob({ 'readOnly': true, 'bgColor':'rgba(255,255,255,0.04)','fgColor':'#658005' });

    // SUPPORT TICKETS

    $('#support-tickets').children('.scroll').nanoScroller();
    $('#support-tickets .support-msg').append('<a href="editfor.php?id="<?php echo $fcheck["id"]; ?>"><span class="support-full">EDIT</span></a>');
    $('#support-tickets2 .support-msg2').append('<a href="editnews.php?id="<?php echo $fcheck2["id"]; ?>"><span class="support-full">EDIT</span></a>');
    
	$('#support-tickets li').click( function() {
      var supMsgHeight = $(this).children('.support-msg').height() + 56;
            contHeight = $('#support-tickets').outerHeight();
              liPosTop = $(this).position().top;
      if ( $(this).hasClass('expanded') ) {
        $(this).removeClass('expanded').removeAttr('style');
      } else {
        $(this).addClass('expanded').css('height', supMsgHeight)
        .siblings('li.expanded').removeClass('expanded').removeAttr('style');
      };
      if ( liPosTop + supMsgHeight > contHeight ) {
        $(this).parents('.scroll-cont').animate({ scrollTop: supMsgHeight }, 600);
      } else if ( $(this).is(':nth-last-child(-n+3)') ) {
        $(this).parents('.scroll-cont').animate({ scrollTop: contHeight + 41 }, 600);
      };
    }).children('p').click( function(e) { return false; });

    // TODO LIST

    $('#todo-list ul li').click( function() {
      $(this).toggleClass('done');
    });

    // CALENDAR

    $('#calendar').glDatePicker({ showAlways: true, position: "static" });
    $.fn.insertEvent = function( content, time ) {
      var trParent = $(this).parents('tr');
             evDay = $(this).text();
              time = time || '';
      $('<tr id="day-'+evDay+'" class="cal-event"><td colspan="7">'+content+'<span>'+time+'</span></td></tr>').insertAfter(trParent);
    };
    $.fn.calShowEv = function() {
      $('.gldp-default').find('.has-ev').click( function() {
        var evDay = $(this).children('div').text();
           evCont = $(this).parents('tr').siblings('#day-'+evDay+'');
        if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
          $(evCont).removeClass('expanded');
        } else {
          $(this).parents('tbody').children('tr').find('td.selected').removeClass('selected');
          $(this).addClass('selected');
          $(evCont).addClass('expanded').siblings('.cal-event').removeClass('expanded');
        }
      });
    };
    //$.fn.calEvents = function() {
    //  var calDay = $('.gldp-default').find('.gldp-default-day');
    // $(calDay).eq(0).addClass('has-ev').children('div')
    //    .append('<span class="cal-event-marker imp"></span>')
    //    .insertEvent('Payday. Cha-ching.', '8:00 AM');
    //  $(calDay).eq(3).addClass('has-ev').children('div')
    //    .append('<span class="cal-event-marker"></span>')
    //    .insertEvent('Conference. Yay!', '10:00 AM');
    //  $(calDay).eq(10).addClass('has-ev').children('div')
    //    .append('<span class="cal-event-marker"></span>')
    //    .insertEvent('Jury duty. Meh.', '13:30 PM');
    //  $(calDay).eq(18).addClass('has-ev').children('div')
    //    .append('<span class="cal-event-marker imp"></span>')
    //    .insertEvent('Get car serviced.', '14:00 PM');
    //  $.fn.calShowEv();
    //};

    // FLUID LAYOUT

    var docWidth = $(document).width();
    if (docWidth < 1699 && docWidth > 1499) {
      $('#content')
        .children('#tb-box').removeClass('g7').addClass('g6');
    } else if (docWidth < 1700 && docWidth > 1300) {
      $('#content')
        .children('#stats-cont').removeClass('g2').addClass('g4')
        .siblings('#users-cont').removeClass('g4').addClass('g6')
        .siblings('#chart-box').removeClass('row1').addClass('row2').insertAfter('#recent-conv');
    } else if (docWidth < 1300 && docWidth > 1063) {
      $('#content')
        .children('#stats-cont').removeClass('g2').addClass('g3')
        .siblings('#bk-mng').removeClass('g4').addClass('g7')
        .siblings('#users-cont').removeClass('g4').addClass('g6').insertAfter('#bk-mng')
        .siblings('#chart-box').removeClass('row1').addClass('row2').insertAfter('#users-cont')
        .siblings('#todo-list').removeClass('g5').addClass('g7').insertAfter('#chart-box')
        .siblings('#recent-conv').removeClass('g5').addClass('g9').insertAfter('#chart-box')
        .siblings('#support-tickets').removeClass('g6').addClass('g10').insertAfter('#users-cont')
        .siblings('#tb-box').insertAfter('#ind-cont');
    } else if (docWidth < 1064 && docWidth > 799) {
      $('#content')
        .children('#ind-cont').insertAfter('#cal-box')
        .siblings('#tb-box').insertAfter('#ind-cont')
        .siblings('#chart-box').insertAfter('#users-cont').removeClass('row1').addClass('row2');
    } else if (docWidth < 817 && docWidth > 680) {
      $('#content')
        .children('#bk-mng').insertAfter('#stats-cont');
    } else if (docWidth < 641) {
      $('#content')
        .children('#users-cont').insertAfter('#stats-cont');
    };
    if (docWidth < 1081 && docWidth > 1064) {
      $('#content')
        .children('#chart-box').removeClass('row2').addClass('row1').insertAfter('#users-cont')
    };

  </script>
   <script language="JavaScript">
    function P91Fadeout(id, geschwindigkeit) {
  var fps = Math.round(geschwindigkeit / 100); 
  var tmp = 0;
    for(i = 100; i >= 0; i--) {
        setTimeout("P91Fadeout_fade('" + id + "'," + i + ")", (tmp * fps));
        tmp++;
    }
}
function P91Fadeout_fade(id, pas) {
  var heurix = document.getElementById(id).style;
  if(pas > 0) {
    heurix.opacity = (pas / 100);
    heurix.MozOpacity = (pas / 100);
    heurix.KhtmlOpacity = (pas / 100);
    heurix.filter = "alpha(opacity=" + pas + ")"; 
  } else {
    heurix.display = "none";
  }
}
window.setTimeout("P91Fadeout('toast-container', 2000)", 5000);
</script>
</body>
</html>