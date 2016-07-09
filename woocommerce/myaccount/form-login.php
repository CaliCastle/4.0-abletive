<?php
/**
 * Login Form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

    <div class="col2-set clearfix" id="customer_login">

    <div class="col-1">

<?php endif; ?>

    <h2><?php esc_html_e( 'Login', 'burst' ); ?></h2>

    <form method="post" class="login">

        <?php do_action( 'woocommerce_login_form_start' ); ?>

        <p class="form-row form-row-wide">
            <input type="text" class="input-text placeholder" placeholder="<?php esc_html_e('Username or email', 'burst'); ?>" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
        </p>
        <p class="form-row form-row-wide">
            <input class="input-text placeholder" placeholder="<?php esc_html_e('Password', 'burst'); ?>" type="password" name="password" id="password" />
        </p>

        <?php do_action( 'woocommerce_login_form' ); ?>

        <p class="form-row">
            <?php wp_nonce_field( 'woocommerce-login' ); ?>
            <input type="submit" class="button" name="login" value="<?php esc_html_e( 'Login', 'burst' ); ?>" />
            <a class="lost_password woo-lost_password2" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost Password?', 'burst' ); ?></a>
            <label for="rememberme" class="inline woo-my-account-rememberme">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'burst' ); ?>
            </label>
        </p>

        <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

    </div>

    <div class="col-2">

        <h2><?php esc_html_e( 'Register', 'burst' ); ?></h2>

        <form method="post" class="register">

            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <p class="form-row form-row-wide">
                    <input type="text" class="input-text placeholder" placeholder="<?php esc_html_e('Username', 'burst'); ?>" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                </p>

            <?php endif; ?>

            <p class="form-row form-row-wide">
                <input type="email" class="input-text placeholder" placeholder="<?php esc_html_e('Email', 'burst'); ?>" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <p class="form-row form-row-wide">
                    <input type="password" class="input-text placeholder" placeholder="<?php esc_html_e('Password', 'burst'); ?>" name="password" id="reg_password" />
                </p>

            <?php endif; ?>

            <!-- Spam Trap -->
            <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'burst' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

            <?php do_action( 'woocommerce_register_form' ); ?>
            <?php do_action( 'register_form' ); ?>

            <p class="form-row">
                <?php wp_nonce_field( 'woocommerce-register' ); ?>
                <input type="submit" class="button" name="register" value="<?php esc_html_e( 'Register', 'burst' ); ?>" />
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

    </div>

    </div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>