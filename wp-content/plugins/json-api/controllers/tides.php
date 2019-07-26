<?php
/*
Controller name: Tides & Current
Controller description: Basic introspection methods
*/

class JSON_API_Tides_Controller {  
  
  public function get_tide_current_by_date() {
		global $wpdb, $json_api, $post;
		$code = $json_api->query->get("code");
		$date = $json_api->query->get("date");
		$begin = $json_api->query->get("begin");
		$end = $json_api->query->get("end");
		
		$post = $json_api->introspector->get_posts(array("meta_key" => "code", "meta_value" => $code));
		
		if(!$post)
		{
			$json_api->error("Not found.");
		}		
		
		$location = $post[0]->custom_fields->location[0];	
		$wp_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM tides_%d WHERE location = %d AND date >= %s limit %d,%d", array(substr($date, 0, 4), $location, $date, $begin, $end)));
		//print_r($wpdb->last_query);exit;
		
		if($wp_results)
		{
			$results = array(); 
			foreach($wp_results as $res){ 
				$result = array(); 
				
				if(empty($res->flood2))
				{
					$result['high1'] = $res->high1; 
					$result['low1'] = $res->low1; 
					$result['high2'] = $res->high2; 
					$result['low2'] = $res->low2; 
				}
				else
				{
					$result['slack1'] = $res->slack1; 
					$result['flood1'] = $res->flood1; 
					$result['slack2'] = $res->slack2; 
					$result['ebb1'] = $res->ebb1; 
					$result['slack3'] = $res->slack3; 
					$result['flood2'] = $res->flood2; 
					$result['slack4'] = $res->slack4; 
					$result['ebb2'] = $res->ebb2; 
					$result['slack5'] = $res->slack5; 
					$result['flood3'] = $res->flood3; 
					$result['slack6'] = $res->slack6; 
				}
				$result['moon'] = $res->moon; 
				$result['sunrise'] = $res->sunrise; 
				$result['sunset'] = $res->sunset; 
				$result['moonrise'] = $res->moonrise; 
				$result['moonset'] = $res->moonset; 
				
				foreach($result as $key => $value)
				{
					if(empty($value)) unset($result[$key]);
				}
				$results[$res->date] = $result;
			}             
		}
		return $results;
	}
	
	public function get_info_location() {
	    global $json_api, $post;
	    $code = $json_api->query->get("code");    
	    $post = $json_api->introspector->get_posts(array("meta_key" => "code", "meta_value" => $code));
	    
	    if(!$post)
	    {
	        $json_api->error("Not found.");
	    }	    
	    
	    $results = array(); 
	    $results['name'] = $post[0]->title;
	    $results['latitude'] = $post[0]->custom_fields->latitude[0];
	    $results['longitude'] = $post[0]->custom_fields->longitude[0];
	    
	    return $results;
	}
	
}

?>
