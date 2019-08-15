<?php
/*
Controller name: Tides & Current
Controller description: Basic introspection methods
*/

class JSON_API_Tides_Controller {  
  
  /*
  public function get_tide_current_by_date() {
		global $wpdb, $json_api, $post;
		$code = $json_api->query->get("code");
		$date = $json_api->query->get("date");
		$begin = $json_api->query->get("begin");
		$end = $json_api->query->get("end");
		$total_records = $json_api->query->get("total");
		
		$post = $json_api->introspector->get_posts(array("meta_key" => "code", "meta_value" => $code));
		
		if(!$post)
		{
			$json_api->error("Not found.");
		}		
		
		$location = $post[0]->custom_fields->location[0];	
		$wp_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM tides_%d WHERE location = %d AND date >= %s limit %d,%d", array(substr($date, 0, 4), $location, $date, 0, $total_records)));
		//print_r($wpdb->last_query);exit;
		
		$results = array();
		$records = count($wp_results);
		self::add_to_array($wp_results, $results);		
		
		if(($total_records - $records) > 0)
		{
		    $wp_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM tides_%d WHERE location = %d AND date >= %s limit %d,%d", array(substr($date, 0, 4) + 1, $location, $date, 0, $total_records - $records)));
		    self::add_to_array($wp_results, $results);
		}
		
		return self::getTidesCurrentData($results, $begin, $end);
	}
	*/
    
    /*
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
        $wp_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM tides_currents_data WHERE location = %d AND date >= %s limit %d,%d", array($location, $date, $begin, $end)));
        //print_r($wpdb->last_query);exit;
        
        $results = array();
        self::add_to_array($wp_results, $results);       
        
        return $results;
    }
    */
    
    public function get_tide_current_by_date() {
        global $wpdb, $json_api, $post;
        $code = $json_api->query->get("code");
        $date = $json_api->query->get("date");
        $begin = $json_api->query->get("begin");
        $end = $json_api->query->get("end");
        $total_records = $json_api->query->get("total");
        
        $post = $json_api->introspector->get_posts(array("meta_key" => "code", "meta_value" => $code));
        
        if(empty($code) || count($post) == 0 || count($post) > 1)
        {
            $json_api->error("Not found.");
        }
        
        $location = $post[0]->custom_fields->location[0];
        $wp_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . self::getTableName(substr($date, 0, 4), $location) . " WHERE location = %d AND date >= %s limit %d,%d", array($location, $date, 0, $total_records)));
        //print_r($wpdb->last_query);exit;
        
        $results = array();
        $records = count($wp_results);
        self::add_to_array($wp_results, $results);
        
        if(($total_records - $records) > 0)
        {
            $wp_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM ". self::getTableName(substr($date, 0, 4) + 1, $location) . " WHERE location = %d AND date >= %s limit %d,%d", array($location, $date, 0, $total_records - $records)));
            self::add_to_array($wp_results, $results);
        }
        
        return self::getTidesCurrentData($results, $begin, $end);
    }
    
    protected function getTableName($year = 2019, $location = 0)
    {
        $prefix = "tides_" . $year;
        if($location >= 0 && $location <= 500)
        {
            return $prefix . "_0_500";
        }
        else
        if($location >= 501 && $location <= 1000)
        {
            return $prefix . "_501_1000";
        }
        else
        if($location >= 1001 && $location <= 1500)
        {
            return $prefix . "_1001_1500";
        }
        else
        if($location >= 1501 && $location <= 2000)
        {
            return $prefix . "_1501_2000";
        }
        else
        if($location >= 2001 && $location <= 2500)
        {
            return $prefix . "_2001_2500";
        }
        else
        if($location >= 2501 && $location <= 3000)
        {
            return $prefix . "_2501_3000";
        }
        else
        if($location >= 3001 && $location <= 3500)
        {
            return $prefix . "_3001_3500";
        }
        else
        if($location >= 3501 && $location <= 4000)
        {
            return $prefix . "_3501_4000";
        }
        else
        if($location >= 4001 && $location <= 4500)
        {
            return $prefix . "_4001_4500";
        }
        else
        if($location >= 4501 && $location <= 5000)
        {
            return $prefix . "_4501_5000";
        }
        else
        if($location >= 5001 && $location <= 5500)
        {
            return $prefix . "_5001_5500";
        }
        else
        if($location >= 5501 && $location <= 6000)
        {
            return $prefix . "_5501_6000";
        }
        else
        if($location >= 6001 && $location <= 6500)
        {
            return $prefix . "_6001_6500";
        }
        else
        if($location >= 6501 && $location <= 7000)
        {
            return $prefix . "_6501_7000";
        }
        else
        if($location >= 7001 && $location <= 7500)
        {
            return $prefix . "_7001_7500";
        }
        else
        if($location >= 7501 && $location <= 8000)
        {
            return $prefix . "_7501_8000";
        }
        else
        if($location >= 8001 && $location <= 8500)
        {
            return $prefix . "_8001_8500";
        }
        else
        if($location >= 8501 && $location <= 9000)
        {
            return $prefix . "_8501_9000";
        }
        else
        if($location >= 9001 && $location <= 9123)
        {
            return $prefix . "_9001_9123";
        }
    }
    
    protected function getTidesCurrentData($results = array(), $begin, $end)
	{
	    if($results)
	    {
	        $arrs = array();
	        $i = 1; $j = 0;
	        foreach($results as $key => $value)
	        {	         
	            if($j == $end)
	            {
	                break;
	            }
	            if($i >= $begin + 1)
	            {
	                $arrs[$key] = $value;
	                $j++;
	            }
	            $i++; 
	        }
	    }	  
	    
	    return $arrs;
	}
	
	protected function add_to_array($wp_results, &$results = array())
	{
	    if($wp_results)
	    {
    	    foreach($wp_results as $res)
    	    {
    	        $result = array();    	        
    	        $result['high1'] = $res->high1;
    	        $result['low1'] = $res->low1;
    	        $result['high2'] = $res->high2;
    	        $result['low2'] = $res->low2;
    	        $result['high3'] = $res->high3;
    	        $result['low3'] = $res->low3;
    	        $result['high4'] = $res->high4;
    	        $result['low4'] = $res->low4;
    	        $result['high5'] = $res->high5;
    	        $result['low5'] = $res->low5;
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
	}
	
	public function get_info_location() {
	    global $json_api;
	    $code = $json_api->query->get("code");    
	    $post = $json_api->introspector->get_posts(array("meta_key" => "code", "meta_value" => $code));
	    
	    if(empty($code) || count($post) == 0 || count($post) > 1)
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
