<?php
//add_action('init', 'postme');

	function get_appointment_availablity_by_date_and_attendence1(){
					global $wpdb;
					$as = $wpdb->query("INSERT INTO `wp_app_appointments_custom` (`ID`, `created`, `user`, `name`, `email`, `phone`, `address`, `city`, `location`, `service`, `worker`, `price`, `coupon`, `status`, `start`, `end`, `sent`, `sent_worker`, `note`, `gcal_ID`, `gcal_updated`) VALUES (NULL, '2015-09-24 00:00:00', '0', 'sam', 'shimionson@gamil.com', '1212345', 'salanamda', 'khulna', '2', '2', '2', '2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)" );
					
					if($as ===TRUE){ echo 'Wear wing';}

		}
//add_action('init', 'get_appointment_availablity_by_date_and_attendence1');