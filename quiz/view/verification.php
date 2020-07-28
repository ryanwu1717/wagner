<?php
	if(!isset($_SESSION)){ session_start(); } 
    Header("Content-type: image/PNG");
    srand((double)microtime()*1000000);
    $im = imagecreate(100,50);
    $randcolorblack = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    $randcolorgray = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagefill($im,0,0,$randcolorgray);
    while(($randval=rand()%100000)<10000);{
        $_SESSION["verification"] = $randval;
        imagestring($im, 5, 25, 15, $randval, $randcolorblack);
    }
    for($i=0;$i<500;$i++){
        $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
        imagesetpixel($im, rand()%150 , rand()%50 , $randcolor);
    }

    ImagePNG($im);
    ImageDestroy($im);
   
?>