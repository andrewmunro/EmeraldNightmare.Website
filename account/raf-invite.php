<?php include( "../configs.php"); 
$page_cat="security" ; // Check, if username session is NOT set then this page will jump to login page
require '../classes/PHPMailerAutoload.php';

if (!isset($_SESSION[ 'username'])) 
{ 
    header( 'Location: '.$website[ 'root']. 'account_log.php'); 
} 
?>

<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>
        <?php echo $website[ 'title']; ?>
        <?php echo $friend[ '1']; ?>
    </title>
    <meta content="false" http-equiv="imagetoolbar" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="description" content="<?php echo $website['description']; ?>">
    <meta name="keywords" content="<?php echo $website['keywords']; ?>">
    <link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
    <link rel="stylesheet" media="all" href="../wow/static/local-common/css/management/common.css" />
    <link rel="stylesheet" media="all" href="../wow/static/css/bnet.css" />
    <link rel="stylesheet" media="print" href="../wow/static/css/bnet-print.css" />
    <link rel="stylesheet" href="../wow/static/css/management/dashboard.css" />
    <link rel="stylesheet" href="../wow/static/css/management/services.css" />
    <link rel="stylesheet" href="../wow/static/css/management/wow/raf.css" />
    <script src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
    <script src="../wow/static/local-common/js/core.js"></script>
    <script src="../wow/static/local-common/js/tooltip.js"></script>
    <!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
    <script type="text/javascript">
        //<![CDATA[
        Core.staticUrl = '/account';
        Core.sharedStaticUrl = 'wow/static/local-common';
        Core.baseUrl = '/account';
        Core.supportUrl = 'http://eu.battle.net/support/';
        Core.secureSupportUrl = 'https://eu.battle.net/support/';
        Core.project = 'bam';
        Core.locale = 'en-gb';
        Core.buildRegion = 'eu';
        Core.shortDateFormat = 'dd/MM/yyyy';
        Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
        Core.loggedIn = true;
        Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/bam/video-player.swf';
        Flash.videoBase = 'http://eu.media.blizzard.com/bam/media/videos';
        Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/rating-pegi.jpg';
        Flash.expressInstall = 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-544112-16']);
        _gaq.push(['_trackPageview']);
        _gaq.push(['_trackPageLoadTime']);
         //]]>
    </script>
</head>

<body class="en-gb logged-in">
    <div id="layout-top">
        <div class="wrapper">
            <div id="header">
                <?php include( "../functions/header_account.php"); ?>
                <?php include( "../functions/footer_man_nav.php"); ?>
                <div id="layout-middle">
                    <div class="wrapper">
                        <div id="content">
                            <div class="dashboard service">
                                <div class="primary">
                                    <div class="header">
                                        <span class="float-right"><span class="form-req">*</span>
                                        <?php echo $friend[ '2']; ?>
                                        </span>
                                        <h2 class="subcategory"><?php echo $friend['3']; ?></h2>
                                        <h3 class="headline"><?php echo $friend['4']; ?></h3>
                                        <a href="">
                                            <img src="../wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft®" width="48" height="48" />
                                        </a>
                                    </div>
                                    <div class="service-wrapper">
                                        <p class="service-nav">
                                            <a href="" class="active">
                                                <?php echo $friend[ '5']; ?>
                                            </a>
                                            <a href="">
                                                <?php echo $friend[ '6']; ?>
                                            </a>
                                            <a href="">
                                                <?php echo $friend[ '7']; ?>
                                            </a>
                                            <a href="">
                                                <?php echo $friend[ '8']; ?>
                                            </a>
                                        </p>
                                        <div class="raf-service-info">
                                            <?php echo $friend[ '9']; ?>
                                            <a href="">
                                                <?php echo $friend[ '10']; ?>
                                            </a>
                                            <?php echo $friend[ '11']; ?>
                                            <ul>
                                                <li>
                                                    <?php echo $friend[ '12']; ?>
                                                </li>
                                                <li>
                                                    <?php echo $friend[ '13']; ?>
                                                </li>
                                                <li>
                                                    <?php echo $friend[ '14']; ?>
                                                </li>
                                            </ul>
                                            <a href="">
                                                <?php echo $friend[ '15']; ?>
                                            </a>
                                            <div class="sub-section">
                                                <?php echo $friend[ '16']; ?>
                                                <br>
                                                <?php echo $friend[ '17']; ?>
                                                <a href="">
                                                    <?php echo $friend[ '18']; ?>
                                                </a>
                                                <?php echo $friend[ '19']; ?>
                                            </div>
                                        </div>
                                        <div class="service-form">
                                            <?php if(!isset($_POST['submit'])) {echo $friend[ '20'];} ?>
                                            <a href="">
                                                <?php if(!isset($_POST['submit'])) { echo $friend[ '21']; }?>
                                            </a>
                                            <form autocomplete="off" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="raf-form">
                                                <input type="hidden" name="csrftoken" value="" />
                                                <?php include( "../configs.php");
                                                if(isset($_POST['submit']))
                                                {
                                                    $link = mysql_connect($serveraddress, $serveruser, $serverpass) or die("Could not connect: ".mysql_error());
                                                    mysql_select_db($server_adb) or die(mysql_error());
                                                    mysql_select_db($server_cdb) or die(mysql_error());
                                                    mysql_select_db($server_db) or die(mysql_error()); /* SQL INJECTION */

                                                    function protect($string) {
                                                        $string = mysql_real_escape_string($string);
                                                        $string = strip_tags($string);
                                                        $string = addslashes($string);
                                                        return $string;
                                                    }

                                                    function sha_password($user, $pass) {
                                                        $user = strtoupper($user);
                                                        $pass = strtoupper($pass);
                                                        return SHA1($user.
                                                            ':'.$pass);
                                                    }

                                                    function generateRandomString($length = 10) {
                                                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                                        $randomString = '';
                                                        for ($i = 0; $i < $length; $i++) {
                                                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                                                        }
                                                        return $randomString;
                                                    }

                                                    function sendMail($to, $username, $code) {
                                                        $mail = new PHPMailer();
                                                        $mail -> IsSMTP();

                                                        $mail->Host       = "mail.yourdomain.com"; // SMTP server
                                                        $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                                                                                   // 1 = errors and messages
                                                                                                   // 2 = messages only
                                                        $mail->SMTPAuth   = true;                  // enable SMTP authentication
                                                        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
                                                        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                                                        $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
                                                        $mail->Username   = "theemeraldnightmare@gmail.com";  // GMAIL username
                                                        $mail->Password   = "Faad6dd70c";            // GMAIL password

                                                        $mail->SetFrom('do-not-reply@emerald-nightmare.com', 'Emerald Nightmare');

                                                        $mail->AddReplyTo("support@emerald-nightmare.com","Emerald Nightmare");

                                                        $mail->Subject = $username." has invited you to join the Emerald Nightmare";
                                                        
                                                        $mail->MsgHTML('<font color="green">Your Referal Link :</font>  <font color="green">http://www.emerald-nightmare.com/register.php?raf='.$code.'</font><p></p><br>');

                                                        $mail->AddAddress($to, $to);

                                                        if(!$mail->Send()) {
                                                          echo "Mailer Error: " . $mail->ErrorInfo;
                                                        } else {
                                                          echo "Message sent!";
                                                        }
                                                    }

                                                    $code = generateRandomString(6); /* START */
                                                    if (isset($_POST['email'])) 
                                                    {
                                                        $email = protect($_POST['email']);
                                                        $ip = $_SERVER['REMOTE_ADDR'];
                                                        $check_account1 = mysql_query("SELECT * FROM `$server_db`.`invite_member` WHERE `friend_email` = '$email';") or die(mysql_error());
                                                        if (mysql_num_rows($check_account1) > 0) 
                                                        {
                                                            echo '<font color="red">Error : this account has already been recruited</font>';

                                                        } 
                                                        else 
                                                        {
                                                            $get_accountinfo = mysql_query("SELECT * FROM `$server_adb`.`account` WHERE username = UPPER('".mysql_real_escape_string($_SESSION['username'])."')");
                                                            $accountinfo = mysql_fetch_assoc($get_accountinfo); // Update 
                                                            mysql_query("INSERT INTO `$server_db`.`invite_member` (`friend_email`,`account_id`,`inv_code`,`ip`) VALUE ('".$email.
                                                                "','".$accountinfo['id'].
                                                                "','".$code.
                                                                "','".$ip.
                                                                "')") or die(mysql_error());
                                                            echo '<font color="yellow">Your Referal Link :</font>  <font color="green">http://www.emerald-nightmare.com/register.php?raf='.$code.
                                                            '</font>                                                <p></p>';
                                                            echo '<font color="green">A copy of this will be sent to your friend.</font>';
                                                            sendMail($email, $_SESSION['username'], $code);


                                                        }
                                                    }

                                                    mysql_close($link); 
                                                }
                                                else 
                                                {
                                            ?> 
                                                            <div class = "form-row required" >                                                    
                                                            <label for="name" class="label-full ">
                                                        <strong><?php echo $friend['22']; ?></strong>
                                                        <span class="form-required">*</span>
                                                    </label>
                                                    <input type="text" name="user" value='<?php echo strtolower($_SESSION['username']); ?>' id="username" class="input border-5 glow-shadow-2 form-disabled" autocomplete="off" tabindex="1" required="required" disabled="disabled" />
                                                </div>
                                                <div class="form-row required">
                                                    <label for="email" class="label-full ">
                                                        <strong><?php echo $friend['24']; ?></strong>
                                                        <span class="form-required">*</span>
                                                    </label>
                                                    <input type="text" id="email" name="email" value="" class="input border-5 glow-shadow-2" maxlength="255" tabindex="2" placeholder="Your friend's e-mail" />
                                                    <?php echo $friend[ '41']; ?>
                                                </div>
                                                <div class="form-row">
                                                    <label for="customMessage" class="label-full">
                                                        <strong><?php echo $friend['35']; ?></strong>
                                                        <span class="form-required"></span>
                                                    </label>
                                                    <textarea rows="8" cols="30" name="customMessage" class="input border-5 glow-shadow-2" id="customMessage" tabindex="3" maxlength="255">
                                                        <?php echo $friend[ '36']; ?>
                                                    </textarea>
                                                    <p class="special-p">
                                                        <?php echo $friend[ '37']; ?>
                                                        <a href="">
                                                            <?php echo $friend[ '38']; ?>
                                                        </a>
                                                    </p>
                                                </div>
                                                <fieldset class="ui-controls ">
                                                    <button class="ui-button button1" type="submit" name="submit" id="settings-submit" value="Send Invitation" tabindex="1">
                                                        <span>
            <span><?php echo $friend['39']; ?></span>
                                                        </span>
                                                    </button>
                                                    <a class="ui-cancel" href="raf-invite.php">
                                                        <span><?php echo $friend['40']; ?></span>
                                                    </a>
                                                </fieldset>
                                                <script type="text/javascript">
                                                    //<![CDATA[
                                                    $(function () {
                                                        var rafSubmit = $('#submit');
                                                        rafSubmit.removeAttr('disabled');
                                                        rafSubmit.removeClass('disabled').removeClass('processing').removeClass('hover');
                                                    });
                                                     //]]>
                                                </script>
                                            </form>
                                            <?php
                                                }
                                                ?>
                                        </div>
                                        <span class="clear"><!-- --></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="layout-bottom">
                    <?php include( "../functions/footer_man.php"); ?>
                </div>
            </div>
            <script type="text/javascript">
                //<![CDATA[
                var xsToken = 'b213c993-d61d-4957-9141-9da399fd7d54';
                var Msg = {
                        support: {
                            ticketNew: 'Ticket {0} was created.',
                            ticketStatus: 'Ticket {0}'
                            s status changed to {
                                1
                            }.
                            ',
ticketOpen: '
                            Open ',
ticketAnswered: '
                            Answered ',
ticketResolved: '
                            Resolved ',
ticketCanceled: '
                            Cancelled ',
ticketArchived: '
                            Archived ',
ticketInfo: '
                            Need Info ',
ticketAll: '
                            View All Tickets '
},
cms: {
requestError: '
                            Your request cannot be completed.
                            ',
ignoreNot: '
                            Not ignoring this user ',
ignoreAlready: '
                            Already ignoring this user ',
stickyRequested: '
                            Sticky requested ',
postAdded: '
                            Post added to tracker ',
postRemoved: '
                            Post removed from tracker ',
userAdded: '
                            User added to tracker ',
userRemoved: '
                            User removed from tracker ',
validationError: '
                            A required field is incomplete ',
characterExceed: '
                            The post body exceeds XXXXXX characters.
                            ',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Item Lvl",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: '
                            Bold ',
italics: '
                            Italics ',
underline: '
                            Underline ',
list: '
                            Unordered List ',
listItem: '
                            List Item ',
quote: '
                            Quote ',
quoteBy: '
                            Posted by {
                                0
                            }
                            ',
unformat: '
                            Remove Formating ',
cleanup: '
                            Fix Linebreaks ',
code: '
                            Code Blocks ',
item: '
                            WoW Item ',
itemPrompt: '
                            Item ID: ',
url: '
                            URL ',
urlPrompt: '
                            URL Address: '
},
ui: {
viewInGallery: '
                            View in gallery ',
loading: '
                            Loading… ',
unexpectedError: '
                            An error has occurred ',
fansiteFind: '
                            Find this on… ',
fansiteFindType: '
                            Find {
                                0
                            }
                            on… ',
fansiteNone: '
                            No fansites available.
                            '
},
grammar: {
colon: ' {
                                0
                            }: ',
first: '
                            First ',
last: '
                            Last '
},
fansite: {
achievement: '
                            achievement ',
character: '
                            character ',
faction: '
                            faction ',
'
                            class ': '
                            class ',
object: '
                            object ',
talentcalc: '
                            talents ',
skill: '
                            profession ',
quest: '
                            quest ',
spell: '
                            spell ',
event: '
                            event ',
title: '
                            title ',
arena: '
                            arena team ',
guild: '
                            guild ',
zone: '
                            zone ',
item: '
                            item ',
race: '
                            race ',
npc: '
                            NPC ',
pet: '
                            pet '
}
};
//]]>
            </script>
            <script src="../wow/static/js/bam.js"></script>
            <script src="../wow/static/local-common/js/tooltip.js?v22"></script>
            <script src="../wow/static/local-common/js/menu.js?v22"></script>
            <script type="text/javascript">
                $(function () {
                    Menu.initialize();
                    Menu.config.colWidth = 190;
                    Locale.dataPath = 'data/i18n.frag.xml';
                });
            </script>
            <!--[if lt IE 8]>
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v22"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
            <script src="../wow/static/js/management/wow/raf.js"></script>
            <script type="text/javascript">
                //<![CDATA[
                Core.load("wow/static/local-common/js/overlay.js?v22");
                Core.load("wow/static/local-common/js/search.js?v22");
                Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v22");
                Core.load("wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v22");
                Core.load("wow/static/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v22");
                Core.load("wow/static/local-common/js/login.js?v22", false, function () {
                    Login.embeddedUrl = '<?php echo $website['
                    root '];?>loginframe.php';
                });
                 //]]>
            </script>
            <script type="text/javascript">
                //<![CDATA[
                (function () {
                    var ga = document.createElement('script');
                    var src = "https://ssl.google-analytics.com/ga.js";
                    if ('http:' == document.location.protocol) {
                        src = "http://www.google-analytics.com/ga.js";
                    }
                    ga.type = 'text/javascript';
                    ga.setAttribute('async', 'true');
                    ga.src = src;
                    var s = document.getElementsByTagName('script');
                    s = s[s.length - 1];
                    s.parentNode.insertBefore(ga, s.nextSibling);
                })();
                 //]]>
            </script>
</body>

</html>
