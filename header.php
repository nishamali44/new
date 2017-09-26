 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 	<head>
 		<title><?php bloginfo( 'name' ); wp_title(); ?></title>
 		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
 		<meta charset="<?php bloginfo( 'charset' ); ?>">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="profile" href="http://gmpg.org/xfn/11">
 		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
 			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 		<?php endif; ?>
 		<?php wp_head(); ?>
 		
 		<?php 
 			$custom_css = esc_attr( get_option( 'katayam_css' ) );
 			if( !empty( $custom_css ) ):
 				echo '<style>' . $custom_css . '</style>';
 			endif;
 		?>
	</head>
	
	<?php 
		
		if( is_front_page() ):
			$katayam_classes = array( 'katayam-class', 'my-class' );
		else:
			$katayam_classes = array( 'no-katayam-class' );
		endif;
		
	?>
	<header>
	
	<body <?php body_class( $katayam_classes ); ?>>
		<div class="container-fluid">
			<div class="row">
			
					<nav class="navbar navbar-default navbar-fixed-top">
					  <div class="container">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="#">KATAYAM THEME</a>
					        </div>
						      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php 
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'container' => false,
									'menu_class' => 'nav navbar-nav navbar-right',
									'walker' => new Walker_Nav_Primary()
									)
								);
							?>
						</div>
					  </div><!-- /.container -->
					</nav>
					</header>
			   </div><!-- /.row -->
			</div><!-- /.container-fluid -->
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />