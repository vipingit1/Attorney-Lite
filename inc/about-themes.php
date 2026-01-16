<?php
//about theme info
add_action( 'admin_menu', 'attorney_lite_abouttheme' );
function attorney_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'attorney-lite'), esc_html__('About Theme', 'attorney-lite'), 'edit_theme_options', 'attorney_lite_guide', 'attorney_lite_mostrar_guide');   
} 
//guidline for about theme
function attorney_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'attorney-lite'); ?>
		   </div>
          <p><?php esc_html_e('Attorney Lite is a clean and professional WordPress theme. It is designed for lawyers, law firms, advocates, legal advisors, solicitors, and counsel services. It is an ideal choice for barristers, legal consultants, or any professional dealing with law and justice. Attorney Lite is SEO-friendly, fast-loading, and easy to customize. Whether you are an independent advocate or a full-service law firm, this theme helps you create a strong online presence. Build credibility, connect with clients, and present your legal services with confidence.','attorney-lite'); ?></p>
          <a href="<?php echo esc_url(ATTORNEY_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'attorney-lite'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(ATTORNEY_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'attorney-lite'); ?></a> | 
				<a href="<?php echo esc_url(ATTORNEY_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'attorney-lite'); ?></a> | 
				<a href="<?php echo esc_url(ATTORNEY_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'attorney-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(ATTORNEY_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'attorney-lite'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>