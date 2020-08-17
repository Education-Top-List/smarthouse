<?php
add_action( 'add_meta_boxes', 'attach_file_pdf' );
if ( ! function_exists( 'attach_file_pdf' ) )
{
  function attach_file_pdf()
  {
       add_meta_box( 'tg_answer', 'PDF file', 'wp_custom_attachment', 'product' );
  }
}
// Upload file
function wp_custom_attachment() {
  wp_nonce_field( plugin_basename(__FILE__), 'wp_custom_attachment_nonce' );
  $html = '<p class="description">Upload your PDF here.</p>';
  $html .= '<input id="wp_custom_attachment" name="wp_custom_attachment" size="25" type="file" value="" />';
  $filearray = get_post_meta( get_the_ID(), 'wp_custom_attachment', true );
  //print_r($filearray);
  if($filearray == ''){
     $html .= '<div><p>No files have been selected</p></div>'; 
  }
  else { 
       $html .= '<div><p>Current file: ' . $filearray['url'] . '</p></div>'; 
  }
  echo $html; 
}

function save_custom_meta_data( $id ) {
  if ( ! empty( $_FILES['wp_custom_attachment']['name'] ) ) {
    $supported_types = array( 'application/pdf' );
    $arr_file_type = wp_check_filetype( basename( $_FILES['wp_custom_attachment']['name'] ) );
    $uploaded_type = $arr_file_type['type'];

    if ( in_array( $uploaded_type, $supported_types ) ) {
      $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
      if ( isset( $upload['error'] ) && $upload['error'] != 0 ) {
        wp_die( 'There was an error uploading your file. The error is: ' . $upload['error'] );
      } else {
        add_post_meta( $id, 'wp_custom_attachment', $upload );
        update_post_meta( $id, 'wp_custom_attachment', $upload );
      }
    }
    else {
      wp_die( "The file type that you've uploaded is not a PDF." );
    }
  }
}
add_action( 'save_post', 'save_custom_meta_data' );


/**
 * Add functionality for file upload.
 */
function update_edit_form() {
  echo ' enctype="multipart/form-data"';
}
add_action( 'post_edit_form_tag', 'update_edit_form' );