<?Php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//****************************************************************************
////////////////////////Downloaded from  www.plus2net.com   //////////////////////////////////////////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////// You can distribute this code with the link to www.plus2net.com ///
/////////////////////////  Please don't  remove the link to www.plus2net.com ///
//////////////////////////
//*****************************************************************************

session_start();
header ("Content-type: image/png");


if(isset($_SESSION['cnt_captcha']))
{
unset($_SESSION['cnt_captcha']); // destroy the session if already there
}
$im = @ImageCreate (130, 40) // Width and hieght of the image. 
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 68, 115, 185); // Assign background color
//////Part 1 Random string generation ////////
$string1="abcdefghijklmnopqrstuvwxyz";
$string2="1234567890";
$string=$string1.$string2;
$text_color = ImageColorAllocate ($im, 255, 255, 255);      // text color is given 

$random_text='';

for($i=1;$i<=5;$i++){
$src = @ImageCreate(20, 20);
$background_color = ImageColorAllocate ($src, 68, 115, 185); // Assign background color

$string= str_shuffle($string);
$text = substr($string,0,1); // One char of the random chars
ImageString($src,5,5,5,$text,$text_color); // 
/*if($i<3){$angle=rand(10,60);}
else{$angle=0;}
*/
$angle=rand(0,0);
$src = imagerotate($src, $angle, 0);
$x=$i*20;
imagecopy($im, $src, $x, 5, 0, 0, 20, 20);
//ImagePng ($src);


$random_text .=$text;
imagedestroy($src);
}
/////End of Part 1 ///////////

$_SESSION['cnt_captcha'] =$random_text; // Assign the random text to session variable


///// Create the image ////////
ImagePng ($im); // image displayed
imagedestroy($im); // Memory allocation for the image is removed. 
?>
