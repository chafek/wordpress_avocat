<?php
/**
 * Template Style Eleven for Info Box
 *
 * @package AbsoluteAddons
 */

defined( 'ABSPATH' ) || exit;
?>

<?php if ( 'true' === $settings['info_box_separator_enable'] ) : ?>
	<div class="info-box-separator-inner">
		<span class="info-box-separator"></span>
	</div>
<?php endif; ?>
<div class="info-box">
	<div class="info-box-icon">
		<?php $this->render_box_icon( $settings ); ?>
	</div>
	<div class="info-box-content">
		<?php if ( ! empty( $settings['info_box_sub_title'] ) ) { ?>
			<span <?php $this->print_render_attribute_string( 'info_box_sub_title' ); ?>><?php absp_render_title( $settings['info_box_sub_title'] ); ?></span>
		<?php } ?>
		<?php if ( ! empty( $settings['info_box_title'] ) ) { ?>
			<h2 <?php $this->print_render_attribute_string( 'info_box_title' ); ?> ><?php absp_render_title( $settings['info_box_title'] ); ?></h2>
		<?php } ?>
		<?php absp_render_content( $settings['info_box_content'] ); ?>
		<?php $this->render_button( $settings ); ?>
	</div>
</div>


