<!DOCTYPE html>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en">
<head>
	<meta http-equiv="pragram"content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta content="telephone=no" name="format-detection" />
    <meta class="foundation-data-attribute-namespace">
    <meta class="foundation-mq-xxlarge">
    <meta class="foundation-mq-xlarge-only">
    <meta class="foundation-mq-xlarge">
    <meta class="foundation-mq-large-only">
    <meta class="foundation-mq-large">
    <meta class="foundation-mq-medium-only">
    <meta class="foundation-mq-medium">
    <meta class="foundation-mq-small-only">
    <meta class="foundation-mq-small">
    <meta class="foundation-mq-topbar">
		<title>NoticeBoard</title>
		<link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>favicon.ico">
		<link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
		<link href="../../../CSS/goodfont.css" rel="stylesheet">
		<link href="../../../CSS/foundation.css" rel="stylesheet">
		<link href="../../../CSS/danmaku/danmaku.css" rel="stylesheet">
		<script src="../../../javascript/jquerym.js"></script>
		<script src="../../../javascript/scroll_loading.js"></script>
		<script src="../../../javascript/danmaku/danmaku.js"></script>
	</head>
	<body>
		<div class="large-12 middle-12 small-12 statusbar"></div>
        <div class="large-12 middle-12 small-12 topbar">
        	<div class="large-push-1 medium-push-1 small-push-1 large-6 medium-9 small-10">
        		<img src="../../../images/back.png" onClick="location.href='<?=base_url()?>'">
        		<p>Danmaku !!!</p>
        	</div>
        </div>

        <p class="large-6 medium-8 small-10 large-push-3 medium-push-2 small-push-1 user_notify">
        	Hi, ready to send a comment to the big screen?<br><br>
            System detected that you are not yet logged in. If you sign in to NoticeBoard, you can choose the color for your comments!<br><br>
            <span style="color:#3AAAF5;cursor:pointer" onClick="location.href='http://hfinotice.sinaapp.com'"><u>Return to Home and log in!</u></span>
        </p>
        
        <div class="content-grid large-6 medium-8 small-10 large-push-3 medium-push-2 small-push-1">
        	<?php
				$attr=array('id'=>'postform');
			 	echo form_open('danmaku/send',$attr); 
			 ?>
                <div class="large-10 medium-10 small-10 large-push-1 medium-push-1 small-push-1 input-unit">
                    <input id="text" type="text" name="text" placeholder="Enter your comment" size="100">
                </div>
    
                <div class="small-2 large-1 medium-1 large-push-10 medium-push-9 small-push-8">
                    <input type="submit" value="Send" class="submit-button">
                </div>
                
                <input type="hidden" name="token" value="<?=$token?>" id="token">
            </form>
		</div>
        <div id="copyright" class="large-6 large-push-3">
        	<p>©HFI Programming · NoticeBoard 2.3</p>
            <p><span onclick="location.href='http://hfinotice.sinaapp.com/copyright/bugreport'">Bug Report</span> | <span onclick="location.href='http://hfinotice.sinaapp.com/copyright/faq'">FAQ</span> | <span onclick="location.href='http://hfinotice.sinaapp.com/copyright/aboutus'">About Us</span></p>
        </div>
	</body>
</html>