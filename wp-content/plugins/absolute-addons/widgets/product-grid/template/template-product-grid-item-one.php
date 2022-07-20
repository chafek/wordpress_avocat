<?php
/**
 * Template Style One Product Grid
 *
 * @package AbsoluteAddons
 */
defined( 'ABSPATH' ) || exit;

/**
 * @var WC_Product $product
 * @var array $settings
 * @var string $grid_image_class
 * @var bool $show_product_label
 * @var bool $show_product_author
 * @var bool $show_product_category
 * @var bool $show_product_excerpt
 * @var bool $show_product_price
 * @var bool $show_product_rating
 * @var bool $show_product_rating_count
 * @var string $sale_badge_align
 * @var string $stockout_text
 * @var string $sale_text
 */
?>
<div class="product-grid-item-inner">
	<div class="product-grid-item">
		<?php
		$this->render_product_labels( $show_product_label, $sale_badge_align, $stockout_text, $sale_text, $product );
		?>
		<div class="<?php echo esc_html( $grid_image_class ); ?>"><?php $this->render_product_image( $product, $settings ); ?></div>
		<div class="product-grid-item-content-inner">
			<div class="product-grid-item-content">
				<?php
				$this->render_product_categories( $show_product_category, $product );
				$this->render_product_title( $settings, $product );
				$this->render_product_excerpt( $show_product_excerpt, $product, $settings );
				$this->render_product_price( $show_product_price, $product );
				$this->render_product_rating( $show_product_rating, $show_product_rating_count, $product );
				?>
			</div>
		</div>
	</div>
	<div class="product-grid-item-hover">
		<span class="product-grid-item-btn">
			<?php absp_wc_loop_add_to_cart(); ?>
		</span>
		<span class="product-grid-item-btn">
			<?php $this->render_wishlist( $product, $settings, '<span class="product-grid-item-wishlist-btn">', '</span>' ); ?>
		</span>
	</div>
</div>
