<?php /**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function survey_slider_get_meta( $value ) {
	global $post;
    
	$field = get_post_meta( $post->ID, $value, true );
	if ( isset( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function survey_slider_add_meta_box() {
	add_meta_box(
		'survey_slider-survey-slider',
		__( 'Survey Answers', 'survey_answers' ),
		'survey_slider_html',
		'survey_slider',
		'normal',
		'high'
	);
}
//add_action( 'add_meta_boxes', 'survey_slider_add_meta_box' ); //This is called from register_post_type / register_meta_box_cb 

function survey_slider_html( $post) {
	wp_nonce_field( '_survey_slider_nonce', 'survey_slider_nonce' ); ?>
	<p>The answers to your question</p>

	<p>
		<label for="survey_slider_answer01_name"><?php _e( 'Answer 01', 'survey_slider' ); ?></label>
        <input type="text" name="survey_slider_answer01_name" id="survey_slider_answer01_name" value="<?php 
        echo (is_edit_page('new')) ? 'Always' : survey_slider_get_meta('survey_slider_answer01_name'); 
        ?>">
		
		<label for="survey_slider_answer01_points"><?php _e( 'Points', 'survey_slider' ); ?></label>
		<input type="text" name="survey_slider_answer01_points" id="survey_slider_answer01_points" value="<?php 
        echo (is_edit_page('new')) ? '5' : survey_slider_get_meta('survey_slider_answer01_points'); 
        ?>">
	</p>	<p>
		<label for="survey_slider_answer02_name"><?php _e( 'Answer 02', 'survey_slider' ); ?></label>
		<input type="text" name="survey_slider_answer02_name" id="survey_slider_answer02_name" value="<?php 
        echo (is_edit_page('new')) ? 'Occasionally' : survey_slider_get_meta('survey_slider_answer02_name'); 
        ?>">

		<label for="survey_slider_answer02_points"><?php _e( 'Points', 'survey_slider' ); ?></label>
		<input type="text" name="survey_slider_answer02_points" id="survey_slider_answer02_points" value="<?php 
        echo (is_edit_page('new')) ? '3' : survey_slider_get_meta('survey_slider_answer02_points'); 
        ?>">
	</p>	<p>
		<label for="survey_slider_answer03_name"><?php _e( 'Answer 03', 'survey_slider' ); ?></label>
		<input type="text" name="survey_slider_answer03_name" id="survey_slider_answer03_name" value="<?php 
        echo (is_edit_page('new')) ? 'Little to Never' : survey_slider_get_meta('survey_slider_answer03_name'); 
        ?>">

		<label for="survey_slider_answer03_points"><?php _e( 'Points', 'survey_slider' ); ?></label>
		<input type="text" name="survey_slider_answer03_points" id="survey_slider_answer03_points" value="<?php 
        echo (is_edit_page('new')) ? '0' : survey_slider_get_meta('survey_slider_answer03_points'); 
        ?>">
	</p><?php
}

function survey_slider_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['survey_slider_nonce'] ) || ! wp_verify_nonce( $_POST['survey_slider_nonce'], '_survey_slider_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['survey_slider_answer01_name'] ) )
		update_post_meta( $post_id, 'survey_slider_answer01_name', esc_attr( $_POST['survey_slider_answer01_name'] ) );
	if ( isset( $_POST['survey_slider_answer01_points'] ) )
		update_post_meta( $post_id, 'survey_slider_answer01_points', esc_attr( $_POST['survey_slider_answer01_points'] ) );
	if ( isset( $_POST['survey_slider_answer02_name'] ) )
		update_post_meta( $post_id, 'survey_slider_answer02_name', esc_attr( $_POST['survey_slider_answer02_name'] ) );
	if ( isset( $_POST['survey_slider_answer02_points'] ) )
		update_post_meta( $post_id, 'survey_slider_answer02_points', esc_attr( $_POST['survey_slider_answer02_points'] ) );
	if ( isset( $_POST['survey_slider_answer03_name'] ) )
		update_post_meta( $post_id, 'survey_slider_answer03_name', esc_attr( $_POST['survey_slider_answer03_name'] ) );
	if ( isset( $_POST['survey_slider_answer03_points'] ) )
		update_post_meta( $post_id, 'survey_slider_answer03_points', esc_attr( $_POST['survey_slider_answer03_points'] ) );
}
add_action( 'save_post', 'survey_slider_save' );

/*
	Usage: survey_slider_get_meta( 'survey_slider_answer01_name' )
	Usage: survey_slider_get_meta( 'survey_slider_answer01_points' )
	Usage: survey_slider_get_meta( 'survey_slider_answer02_name' )
	Usage: survey_slider_get_meta( 'survey_slider_answer02_points' )
	Usage: survey_slider_get_meta( 'survey_slider_answer03_name' )
	Usage: survey_slider_get_meta( 'survey_slider_answer03_points' )
*/
