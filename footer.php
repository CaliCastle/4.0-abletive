<?php
global $mkd_burst_options;

//init variables
$uncovering_footer = false;
$footer_classes_array = array();
$footer_classes = '';
$footer_border_columns = 'yes';
$footer_top_border_color = '';
$footer_top_border_in_grid = '';
$footer_bottom_border_color = '';
$footer_bottom_border_bottom_color = '';
$footer_bottom_border_in_grid = '';
$oblique_section_position = '';

extract(mkd_burst_get_footer_variables());

?>

<?php get_template_part('content-bottom-area'); ?>

    </div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php
if(isset($mkd_burst_options['paspartu']) && $mkd_burst_options['paspartu'] == 'yes'){?>
        <?php if(mkd_burst_is_side_header() && isset($mkd_burst_options['vertical_menu_inside_paspartu']) && $mkd_burst_options['vertical_menu_inside_paspartu'] == 'no') { ?>
			</div> <!-- paspartu_middle_inner close div -->
		<?php } ?>
		</div> <!-- paspartu_inner close div -->
		<?php if((isset($mkd_burst_options['paspartu_on_bottom']) && $mkd_burst_options['paspartu_on_bottom'] == 'yes') ||
        (mkd_burst_is_side_header() && isset($mkd_burst_options['vertical_menu_inside_paspartu']) && $mkd_burst_options['vertical_menu_inside_paspartu'] == 'yes')){ ?>
        <div class="paspartu_bottom"></div>
    <?php }?>
    </div> <!-- paspartu_outer close div -->
<?php
}
?>

<?php get_template_part('social-sidebar'); ?>

<?php if(mkd_burst_space_around_content() && !mkd_burst_include_footer_in_content()){ ?>
    </div></div> <!-- space_around_content close div -->
<?php } ?>

<footer <?php mkd_burst_class_attribute($footer_classes); ?>>
	<div class="footer_inner clearfix">
		<?php

		if($display_footer_top) {
			if($footer_top_border_color != ''){ ?>
				<?php if($footer_top_border_in_grid != '') { ?>
					<div class="footer_ingrid_border_holder_outer">
				<?php } ?>
						<div class="footer_top_border_holder <?php echo esc_attr($footer_top_border_in_grid); ?>" <?php mkd_burst_inline_style($footer_top_border_color); ?>></div>
				<?php if($footer_top_border_in_grid != '') { ?>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="footer_top_holder">
				<div class="footer_top<?php if(!$footer_in_grid) {echo " footer_top_full";} ?>">
					<?php if($footer_in_grid){ ?>
					<div class="container">
						<div class="container_inner">
							<?php } ?>
							<?php switch ($footer_top_columns) {
								case 6:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="mkd_column column1">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_1')) {
                                                    dynamic_sidebar( 'footer_column_1' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column2">
											<div class="column_inner">
												<div class="two_columns_50_50 clearfix">
													<div class="mkd_column column1 footer_col2">
														<div class="column_inner">
															<?php if(is_active_sidebar('footer_column_2')) {
                                                                dynamic_sidebar( 'footer_column_2' );
                                                            } ?>
														</div>
													</div>
													<div class="mkd_column column2 footer_col3">
														<div class="column_inner">
															<?php if(is_active_sidebar('footer_column_3')) {
                                                                dynamic_sidebar( 'footer_column_3' );
                                                            } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									break;
								case 5:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="mkd_column column1">
											<div class="column_inner">
												<div class="two_columns_50_50 clearfix">
													<div class="mkd_column column1">
														<div class="column_inner">
															<?php if(is_active_sidebar('footer_column_1')) {
                                                                dynamic_sidebar( 'footer_column_1' );
                                                            } ?>
														</div>
													</div>
													<div class="mkd_column column2">
														<div class="column_inner">
															<?php if(is_active_sidebar('footer_column_2')) {
                                                                dynamic_sidebar( 'footer_column_2' );
                                                            } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="mkd_column column2 footer_col3">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_3')) {
                                                    dynamic_sidebar( 'footer_column_3' );
                                                } ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 4:
									?>
									<div class="four_columns clearfix">
										<div class="mkd_column column1">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_1')) {
                                                    dynamic_sidebar( 'footer_column_1' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column2">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_2')) {
                                                    dynamic_sidebar( 'footer_column_2' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column3">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_3')) {
                                                    dynamic_sidebar( 'footer_column_3' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column4">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_4')) {
                                                    dynamic_sidebar( 'footer_column_4' );
                                                } ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 3:
									?>
									<div class="three_columns clearfix">
										<div class="mkd_column column1">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_1')) {
                                                    dynamic_sidebar( 'footer_column_1' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column2">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_2')) {
                                                    dynamic_sidebar( 'footer_column_2' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column3">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_3')) {
                                                    dynamic_sidebar( 'footer_column_3' );
                                                } ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 2:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="mkd_column column1">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_1')) {
                                                    dynamic_sidebar( 'footer_column_1' );
                                                } ?>
											</div>
										</div>
										<div class="mkd_column column2">
											<div class="column_inner">
												<?php if(is_active_sidebar('footer_column_2')) {
                                                    dynamic_sidebar( 'footer_column_2' );
                                                } ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 1:
                                    ?>
                                    <div class="clearfix">
                                        <div class="mkd_column column1">
                                            <div class="column_inner">
                                                <?php if(is_active_sidebar('footer_column_1')) {
                                                    dynamic_sidebar( 'footer_column_1' );
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
									break;
							}
							?>
							<?php if($footer_in_grid){ ?>
						</div>
					</div>
				<?php } ?>
				</div>
                <?php if (isset($mkd_burst_options['footer_oblique_section'])  && $mkd_burst_options['footer_oblique_section'] == "yes"){ ?>
                    <svg class="oblique-section svg-footer-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">
                        <?php if($mkd_burst_options['footer_oblique_section_position'] == 'from_left_to_right'){ ?>
                            <polygon points="0,0 0,86 86,86" />
                        <?php }
                        if($mkd_burst_options['footer_oblique_section_position'] == 'from_right_to_left'){ ?>
                            <polygon points="0,86 86,0 86,86" />
                        <?php } ?>
                    </svg>
                <?php } ?>

			</div>
		<?php } ?>
		<?php
		$display_footer_text = false;
		if (isset($mkd_burst_options['footer_text'])) {
			if ($mkd_burst_options['footer_text'] == "yes") $display_footer_text = true;
		}
		if($display_footer_text): ?>
            <?php if($footer_bottom_border_color != ''){ ?>
				<?php if($footer_bottom_border_in_grid != '') { ?>
					<div class="footer_ingrid_border_holder_outer">
				<?php } ?>
                		<div class="footer_bottom_border_holder <?php echo esc_attr($footer_bottom_border_in_grid); ?>" <?php mkd_burst_inline_style($footer_bottom_border_color); ?>></div>
				<?php if($footer_bottom_border_in_grid != '') { ?>
					</div>
				<?php } ?>
            <?php } ?>
			<div class="footer_bottom_holder">
                <div class="footer_bottom_holder_inner">
                    <?php if($footer_in_grid){ ?>
                    <div class="container">
                        <div class="container_inner">
                            <?php } ?>

                            <?php switch ($footer_bottom_columns) {
                                case 3:
                                    ?>
                                    <div class="three_columns clearfix">
                                        <div class="mkd_column column1">
                                            <div class="column_inner">
                                                <?php if(is_active_sidebar('footer_bottom_left')) {
                                                    dynamic_sidebar( 'footer_bottom_left' );
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="mkd_column column2">
                                            <div class="column_inner">
                                                <?php if(is_active_sidebar('footer_text')) {
                                                    dynamic_sidebar( 'footer_text' );
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="mkd_column column3">
                                            <div class="column_inner">
                                                <?php if(is_active_sidebar('footer_bottom_right')) {
                                                    dynamic_sidebar( 'footer_bottom_right' );
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <div class="two_columns_50_50 clearfix">
                                        <div class="mkd_column column1">
                                            <div class="column_inner">
                                                <?php if(is_active_sidebar('footer_bottom_left')) {
                                                    dynamic_sidebar( 'footer_bottom_left' );
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="mkd_column column2">
                                            <div class="column_inner">
                                                <?php if(is_active_sidebar('footer_bottom_right')) {
                                                    dynamic_sidebar( 'footer_bottom_right' );
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                case 1:
                                    ?>
                                    <div class="column_inner">
                                        <?php if(is_active_sidebar('footer_text')) {
                                            dynamic_sidebar( 'footer_text' );
                                        } ?>
                                    </div>
                                    <?php
                                    break;
                            }
                            ?>
                            <?php if($footer_in_grid){ ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
			</div>
            <?php if($footer_bottom_border_bottom_color != ''){ ?>
				<div class="footer_bottom_border_bottom_holder <?php echo esc_attr($footer_top_border_in_grid); ?>" <?php mkd_burst_inline_style($footer_bottom_border_bottom_color); ?>></div>
			<?php } ?>
		<?php endif; ?>
		
	</div>
</footer>
<?php if(mkd_burst_space_around_content() && mkd_burst_include_footer_in_content()){ ?>
    </div></div> <!-- space_around_content close div -->
<?php } ?>
</div> <!-- close div.wrapper_inner  -->
</div> <!-- close div.wrapper -->
<?php wp_footer(); ?>
</body>
</html>