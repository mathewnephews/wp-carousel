carousel
========

A Wordpress widget that shows the images from a certain category


How to install:
1.  Download your WordPress Plugin to your desktop.
2.  If downloaded as a zip archive, extract the Plugin folder to your desktop.
3.  Read through the "readme" file thoroughly to insure you follow the installation instructions.
4.  With your FTP program, upload the Plugin folder to the wp-content/plugins folder in your WordPress directory online.
5.  Go to Plugins screen and find the newly uploaded Plugin in the list.
6.  Click Activate Plugin to activate it. 

Check the Details readme file for customization and further instructions. 


I M P O R T A N T


• Add to header.php before css links :
<!-- b oo t str a p c s s -->
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url ('/Carousel-widget/btstrp/css/bootstrap.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url ('/Carousel-widget/btstrp/css/bootstrap-responsive.css'); ?>" />
<!-- / b oo t str a p c s s. -->



• Add to header.php, right before '</head>' :
<!-- bootstrap js for carousel -->
<script type="text/javascript" src="<?php echo plugins_url ('/Carousel-widget/btstrp/js/bootstrap.js?ver=2.3.0.b'); ?>"></script>


• Add to functions.php :
//  custom image size
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'category-thumb', 260, 175, true ); //260 pixels wide (and unlimited height, cropped)
}

•• download the regenerate thumbnails plugin en regenerate the thumbnails


