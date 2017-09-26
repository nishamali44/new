<?php 
 	
 	/*
 		This is the template for the footer
 		
 		@package pearltheme
 	*/
 	
 ?>
 
 <footer>
<div class="katayam-footer">
<div class="col-sm-3 social-media">
<?php echo do_shortcode("[smbtoolbar]"); ?>
</div>
<div class="col-sm-3 contact-info">
<ul>
<li><h5>Phone:1111111111</h5></li>
<li><h5>Email:Nisha.wijerathna@yahoo.co.uk</h5></li>
</ul>
</div>
<div class="col-sm-3">
<h5>Copyright © 2017 NB Templates</h5>

</div>
<div class="col-sm-3 site-info">
				<?php do_action( 'katayam_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://nbtechnologiesweb.com/', 'katayam' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'katayam' ), 'NB Technologiesweb' ); ?></a>
	</div>	
	</div>
 </footer>

 <?php wp_footer(); ?>
 </body>
 </html> 