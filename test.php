<?php
//add_action('init', 'postme');

	function get_appointment_availablity_by_date_and_attendence1(){
		global $wpdb;
		$query = $wpdb->get_results( "SELECT * FROM wp_app_appointments WHERE cid LIKE '55f1dc8f92157'" );	
		
		foreach	($query as $q){
				$ret.= $q->name;
			}
			
			echo $ret;
			//print_r($query);
			/*$att_info= explode( "!", 'Uzzal|12|123!usala|12|123!Ram|12|123' );
			$c= explode( "|", '1|1|1' );
			print_r($c);
			$array_combine = array_combine($att_info,$c);		
			print_r($array_combine);*/				
		
		
		

		}
//add_action('init', 'get_appointment_availablity_by_date_and_attendence1');



function pr(){
	echo print_r($_POST);
	//print_r();
	}
//add_action('init', 'pr');	