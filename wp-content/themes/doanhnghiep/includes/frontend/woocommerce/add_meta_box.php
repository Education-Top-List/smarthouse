<?php 

## ---- 1. Backend ---- ##
// Adding a custom Meta container to admin products pages
add_action( 'add_meta_boxes', 'create_custom_meta_box' );
if ( ! function_exists( 'create_custom_meta_box' ) )
{
  function create_custom_meta_box()
  {
      add_meta_box( 'attach_file_area', 'Attach File', 'tg_attach_file_output', 'product' );
       add_meta_box(
      'tskt_product_meta_box',  __( 'Thông số kĩ thuật', 'cmb' ), 'tskt_custom_content_meta_box', 'product', 'normal','default'
    );
       add_meta_box('thuonghieu_sp','Thương hiệu sản phẩm','thuonghieu_sp_output','product');
  }
}

// Thương hiệu sản phẩm

function thuonghieu_sp_output(){
  global $post;
  $thuonghieu_sp = get_post_meta($post->ID,'_thuonghieu_sp',true); ?>
 <input type="text" class="iptext_adm" id="thuonghieu_sp" name="thuonghieu_sp" value="<?php echo $thuonghieu_sp;?>" />
  <?php
}
function thachpham_thongtin_save( $post_id )
{
 $thuonghieu_sp = sanitize_text_field( $_POST['thuonghieu_sp'] );
 update_post_meta( $post_id, '_thuonghieu_sp', $thuonghieu_sp );
}
add_action( 'save_post', 'thachpham_thongtin_save' );
//  TAB KHUYEN CAO
if ( ! function_exists( 'tskt_custom_content_meta_box' ) ){
  function tskt_custom_content_meta_box( $post ){
        $prefix = '_bhww_'; // global $prefix;
        $tskt = get_post_meta($post->ID, $prefix.'tskt_ip', true) ? get_post_meta($post->ID, $prefix.'tskt_ip', true) : '';
        $args['textarea_rows'] = 6;

        wp_editor( $tskt, 'tskt_ip', $args );


        echo '<input type="hidden" name="tskt_product_field_nonce" value="' . wp_create_nonce() . '">';
      }
    }

//Save the data of the Meta field
    add_action( 'save_post', 'save_tskt_content_meta_box', 10, 1 );
    if ( ! function_exists( 'save_tskt_content_meta_box' ) )
    {

      function save_tskt_content_meta_box( $post_id ) {
        $prefix = '_bhww_'; // global $prefix;

        // We need to verify this with the proper authorization (security stuff).

        // Check if our nonce is set.
        if ( ! isset( $_POST[ 'tskt_product_field_nonce' ] ) ) {
          return $post_id;
        }
        $nonce = $_REQUEST[ 'tskt_product_field_nonce' ];

        //Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce ) ) {
          return $post_id;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
        }

        // Check the user's permissions.
        if ( 'product' == $_POST[ 'post_type' ] ){
          if ( ! current_user_can( 'edit_product', $post_id ) )
            return $post_id;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;
        }

        // Sanitize user input and update the meta field in the database.
        update_post_meta( $post_id, $prefix.'tskt_ip', wp_kses_post($_POST[ 'tskt_ip' ]) );
      }
    }

## ---- 2. Front-end ---- ##

// Create custom tabs in product single pages
    add_filter( 'woocommerce_product_tabs', 'tskt_product_tabs' );
    function tskt_product_tabs( $tabs ) {
      global $post;

      $product_tskt = get_post_meta( $post->ID, '_bhww_tskt_ip', true );

      if ( ! empty( $product_tskt ) ) {
        if(get_locale()=='vi'){
        $tabs['tskt_tab'] = array(
          'title'    => __( 'Thông số kĩ thuật', 'woocommerce' ),
          'priority' => 10,
          'callback' => 'tskt_product_tab_content'
        );
      }else{
            $tabs['tskt_tab'] = array(
          'title'    => __( 'Product Specifications', 'woocommerce' ),
          'priority' => 10,
          'callback' => 'tskt_product_tab_content'
        );
      }
      }
      return $tabs;
    }

// Remove description heading in tabs content
    add_filter('woocommerce_product_description_heading', '__return_null');

// Add content to custom tab in product single pages (1)
    function tskt_product_tab_content() {
      global $post;

      $product_tskt = get_post_meta( $post->ID, '_bhww_tskt_ip', true );

      if ( ! empty( $product_tskt ) ) {
        // Updated to apply the_content filter to WYSIWYG content
        echo apply_filters( 'the_content', $product_tskt );
      }
    }


function tg_attach_file_output($post){
 // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'metatiny_noncename' );

  $field_value = get_post_meta( $post->ID, '_tg_wp_editor', false );
  //print_r($field_value);

  // Settings that we'll pass to wp_editor
  $args = array (
        'tinymce' => true,
        'quicktags' => true,
  );
  
  wp_editor( $field_value[0], '_tg_wp_editor', $args );
  
 }

 /* When the post is saved, saves our custom data */
function metabox_tinymce( $post_id ) {

  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times
  if ( ( isset ( $_POST['metatiny_noncename'] ) ) && ( ! wp_verify_nonce( $_POST['metatiny_noncename'], plugin_basename( __FILE__ ) ) ) )
      return;

  // Check permissions
  if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
      return;
    }    
  }
  else {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }
  }

  // OK, we're authenticated: we need to find and save the data
  if ( isset ( $_POST['_tg_wp_editor'] ) ) {
    update_post_meta( $post_id, '_tg_wp_editor', $_POST['_tg_wp_editor'] );
  }



}
add_action( 'save_post', 'metabox_tinymce' );


function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Made In Italy', 'sm-textdomain' ), 'sm_meta_callback', 'product' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
  <p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Made in Italy', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
<?php }
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );