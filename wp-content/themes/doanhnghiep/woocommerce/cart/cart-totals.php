<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>


		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>


			<p>Tạm tính <?php wc_cart_totals_order_total_html(); ?></p>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>


	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
