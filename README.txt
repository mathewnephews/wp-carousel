Carousel Widget

install:

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


