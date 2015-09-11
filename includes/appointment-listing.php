<?php
/** Step 2 (from text above). */
add_action( 'admin_menu', 'menu_appointment_listing' );

/** Step 1. */
function menu_appointment_listing() {
	add_menu_page( 'Appointment listing', 'Appointment listing', 'update_core', 'appointment-listing', 'appointment_listing' );
}
function appointment_listing(){


?>

<table cellspacing="0" class="widefat">
		<thead>
				<tr>
						<th style=""></th>
								<th>Provider</th>
								<th>Date/Time</th>
								<th>Hour Start</th>
								<th>Hour End</th>
								<th>Break Enable</th>
								<th>Break Start</th>
								<th>Break Start</th>
								<th>Block</th>
				</tr>
		</thead>

		<tfoot>
				<tr>
						<th style=""></th>
								<th>Provider</th>
								<th>Date/Time</th>
								<th>Hour Start</th>
								<th>Hour End</th>
								<th>Break Enable</th>
								<th>Break Start</th>
								<th>Break Start</th>
								<th>Block</th>
						</tr>

		</tfoot>

		<tbody>

			<?php 
			global $wpdb;
			$workers = $wpdb->get_results( "SELECT * FROM  `wp_three_line_appointment`  WHERE  `date` >= CURRENT_TIMESTAMP ORDER BY `date` ASC, `working_hours_start` ASC" );
			
			foreach($workers as $worker){ 
			$user = get_user_by( 'id', $worker->worker );
			if($worker->block=='0'){
				$blc = 'background-color: #32E007;    border: 1px solid #32E007;    padding: 2px 10px;    border-radius: 3px;    color: #FFF;';
				}elseif($worker->block=='1'){
				$blc = 'background-color: #FD4444;    border: 1px solid #FD4444;    padding: 2px 10px;    border-radius: 3px;    color: #FFF;';
					}
			?>
				<tr>
						<th style=""></th>
								<th><?php echo $user->first_name . ' ' . $user->last_name; ?></th>
								<th><?php echo $worker->date; ?></th>
								<th><?php echo $worker->working_hours_start; ?></th>
								<th><?php echo $worker->working_hours_end; ?></th>
								<th><?php if(!empty($worker->break_enable)){echo 'No'; }else{ echo 'Yes';}; ?></th>
								<th><?php echo $worker->break_start; ?></th>
								<th><?php echo $worker->break_end; ?></th>
								<th><button id="block_<?php echo $worker->ID; ?>" style=" <?php echo $blc; ?> "  value="<?php echo $worker->ID; ?>" >Block</button></th>
				</tr>
                
<script>
					jQuery(document).ready(function($) {
						$( "#block_<?php echo $worker->ID; ?>" ).click(function() {
							var data = $(this).attr( "value" );
								//alert(data);
							var block = {action: "block", data: data, nonce: "<?php wp_create_nonce() ?>"};	
								$.post(ajaxurl, block, function(response) {
										
											if ( response && response.error ){
												alert(response.error);
												
											}else{
												alert('Updated...');
												$(this).attr("style",response.result);
												<?php $url =  admin_url('admin.php?page=appointment-listing'); ?>
												window.location.href='<?php echo $url; ?>';
												
											}
									},'json');
											
						});						
				});						

</script>
                
            
            <?php } ?>

		</tbody>
	</table>





	
<?php
}
?>