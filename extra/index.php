<?php


	flush();
	include 'includes/Mobile_Detect.php';
	$detect = new Mobile_Detect();
	$canvas_site_url_mobile = 'http://s82168.gridserver.com/scms/admin/pages/live/fbtab/mobile/NTI1MzI1LjI0';
	$facebook_site_url = 'https://www.facebook.com/verizon/app_571165226298774';


	if( $detect->isMobile() == true ){

		header('Location: ' . $canvas_site_url_mobile, true, 301);

	}else{
		
		header('Location: ' . $facebook_site_url, true, 301);
	}


	

?>