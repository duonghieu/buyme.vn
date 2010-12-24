
<?php
	$wdetail = 250;
	$hdetail = 250;
	
	$wlist = 160;
	$hlist = 120;
	
	$wthumb = 80;
	$hthumb = 80;
	
	$wsmallthumb = 50;
	$hsmallthumb = 50;
	
	$imagename = '20100608173306_2.jpg';
	$imagenewname = 'canon-eOs-550d_2.jpg';
	$userid = 1;
	// *** Include the class
	include("ResizeImage/resize-class.php");

	// *** 1) Initialise / load image
	$fullimage = $rdetail = $rlist = $rthumb = $rsmallthumb = new resize($imagename);	
	
	//$fullimage->saveImage($userid.'/images/product/'.$imagename);
	
	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	// *** 3) Save image
	
	$rdetail->resizeImage($wdetail, $hdetail, 'crop');
	$rdetail->saveImage($userid.'/images/product/250x250/'.$imagenewname);
	
	$rlist->resizeImage($wlist, $hlist, 'crop');
	$rlist->saveImage($userid.'/images/product/160x120/'.$imagenewname);
	
	$rthumb->resizeImage($wthumb, $hthumb, 'crop');
	$rthumb->saveImage($userid.'/images/product/80x80/'.$imagenewname);
	
	$rsmallthumb->resizeImage($wsmallthumb, $hsmallthumb, 'crop');
	$rsmallthumb->saveImage($userid.'/images/product/50x50/'.$imagenewname);

	
	
	
	

?>
