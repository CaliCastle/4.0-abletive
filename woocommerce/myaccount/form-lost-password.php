<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>

<?php wc_print_notices(); ?>

<form method="post" class="woocommerce-ResetPassword lost_reset_password">

    <?php if( 'lost_password' === $args['form'] ) : ?>

        <p><?php echo wp_kses_post(apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'burst' ) )); ?></p>

        <p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
            <label for="user_login"><?php esc_html_e( 'Username or email', 'burst' ); ?></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text placeholder" placeholder="<?php esc_html_e('Username or email', 'burst'); ?>" type="text" name="user_login" id="user_login" />
        </p>

    <?php else : ?>

        <p><?php echo wp_kses_post(apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'burst') )); ?></p>

        <p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
            <label for="password_1"><?php esc_html_e( 'New password', 'burst' ); ?> <span class="required">*</span></label>
            <input type="password" placeholder="<?php esc_html_e('New password', 'burst'); ?>" class="input-text placeholder" name="password_1" id="password_1" />
        </p>
        <p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
            <label for="password_2"><?php esc_html_e( 'Re-enter new password', 'burst' ); ?> <span class="required">*</span></label>
            <input type="password" placeholder="<?php esc_html_e('Re-enter new password', 'burst'); ?>" class="input-text placeholder" name="password_2" id="password_2" />
        </p>

        <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? esc_attr($args['key']) : ''; ?>" />
        <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? esc_attr($args['login']) : ''; ?>" />

    <?php endif; ?>

    <div class="clear"></div>

    <p class="form-row">
        <input type="hidden" name="wc_reset_password" value="true" />
        <input type="submit" class="woocommerce-Button button" value="<?php echo 'lost_password' == $args['form'] ? esc_html__( 'Reset Password', 'burst' ) : esc_html__( 'Save', 'burst' ); ?>" />
    </p>

    <?php wp_nonce_field( $args['form'] ); ?>

</form>