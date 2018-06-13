<?php
  // JSON string
  $someJSON = '[{"course":"2","sem":"3","subject":"1","dayTime":[{"id":"1","time":"01:00"},{"id":"2","time":"01:00"},{"id":"1","time":"01:00"},{"id":"2","time":"01:00"}]},{"course":"1","sem":"2","subject":"1","dayTime":[{"id":"1","time":"01:00"},{"id":"2","time":"01:00"},{"id":"1","time":"01:00"},{"id":"2","time":"01:00"}]}]';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
 // print_r($someArray);        // Dump all data of the Array
 // echo $someArray[0]["course"]; // Access Array data
// foreach ($someArray as $key => $value) {
    // echo $value["course"]";
  // }
  
  
  foreach($someArray as $v){
	  
	  echo $v['course'];
	  foreach($v['dayTime'] as $a){
		  
		  echo $a['time'];
	  }
	  
	  
	  
  }

?>