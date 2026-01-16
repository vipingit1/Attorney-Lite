<?php
/**
 * The template for displaying the footer.
 *
 * @package Attorney Lite
 */
$footer_text = get_theme_mod('footer_text');
?>

<div id="footer">
  <div id="footer-wrapper">

    <?php if (
      is_active_sidebar('fc-1-rfl') ||
      is_active_sidebar('fc-2-rfl') ||
      is_active_sidebar('fc-3-rfl')
    ) : ?>
      <div class="footerarea">
        <div class="container footer ftr-widg">
          <div class="footer-row">

            <?php foreach (range(1, 3) as $i) : ?>
              <?php if (is_active_sidebar("fc-{$i}-rfl")) : ?>
                <div class="cols-3 widget-column-<?php echo esc_attr($i); ?>">
                  <?php dynamic_sidebar("fc-{$i}-rfl"); ?>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>

            <div class="clear"></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="copyright-wrapper">
      <div class="container">
        <div class="copyright-txt">
          <?php if (!empty($footer_text)) {
            echo esc_html($footer_text) . ' ';
          } ?>
          <?php bloginfo('name'); ?> | 
          <?php esc_html_e('Theme By ', 'attorney-lite'); ?>
          <a href="<?php echo esc_url('https://www.sktthemes.org/product-category/lawyer/');?>" target="_blank" rel="noopener">
            <?php esc_html_e('SKT Lawyer Themes', 'attorney-lite'); ?>
          </a>
        </div>
        <div class="clear"></div>
      </div>
    </div>

  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>