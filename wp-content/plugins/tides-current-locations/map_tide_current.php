<?php
/**
 * Plugin Name: Locations Plugin
 * Plugin URI: local
 * Description: Display locations of all the world
 * Version: 1.0
 * Text Domain: local
 * Author: Nam Tran
 * Author URI: No
 */
 
 function location_plugin_tides_current($atts) {
    global $wpdb;
    
    wp_register_style( 'csslocation1', plugins_url( 'css/posts-data-table.css', __FILE__ ) );
    wp_enqueue_style('csslocation1');
    
    wp_register_style( 'csslocatio2', plugins_url( 'css/posts-data-table.min.css', __FILE__ ) );
    wp_enqueue_style('csslocation2');
    
    $wp_results = $wpdb->get_results($wpdb->prepare("SELECT p.post_title, p.guid, pm.meta_key, pm.meta_value FROM wp_posts p, wp_postmeta pm WHERE p.ID = pm.post_id AND pm.meta_key IN ('code', 'latitude', 'longitude') AND p.post_type = 'post'", array()));
    
    $child ='';
    $content = '<div id="posts-table-1_wrapper" class="dataTables_wrapper no-footer">
                   <table id="posts-table-1" class="posts-data-table dataTable no-footer dtr-inline" style="width: 100%;" width="100%" cellspacing="0">
                      <thead>
                         <tr role="row">
                            <th class="sorting_asc" style="width: 474px;">Title</th>
                            <th class="sorting" style="width: 67px;">Latitude</th>
                            <th class="sorting" style="width: 83px;">Longitude</th>
                            <th class="sorting" style="width: 70px;">Code</th>
                         </tr>
                      </thead>
                      <tbody>
                         [[string_replace_location]]                       
                      </tbody>
                   </table>
                </div>';   
   
   
    //print_r($posts);exit;    

    $arrs = array();
    $count = 1;
    
    foreach($wp_results as $res)
    {
        $arrs[$count - 1] = $res->meta_value;
        
        if($count == 3)
        {
            $child .= '<tr>
                        <td class="sorting_1"><a href="'.$res->guid.'" target="_blank">'.$res->post_title.'</a></td>
                        <td>'.$arrs[0].'</td>
                        <td>'.$arrs[1].'</td>
                        <td>'.$arrs[2].'</td>
                     </tr>';
            $count = 0;
        }
        $count++;
    }	 
    
    $content = str_replace("[[string_replace_location]]", $child, $content);
    return $content;
}
 
add_shortcode('location-plugin-tides-current', 'location_plugin_tides_current');