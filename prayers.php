function fetch_prayer_times($city) {
		$api_key = 'YOUR_API_KEY'; // Replace with your actual API key
	
		// Check if the API key is set
		if (empty($api_key)) {
			return false; // You may want to handle this more gracefully
		}
	
		$url = "https://muslimsalat.com/{$city}.json?key={YOUR_API_KEY}&method=5";
	
		$response = wp_remote_get($url);
	
		// Check for WP_Error and non-200 HTTP status
		if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
			return false; // You may want to handle this more gracefully
		}
	
		$body = wp_remote_retrieve_body($response);
		return json_decode($body, true);
	}
	
	function display_prayer_times_table() {
		$cities = ['dubai', 'abu dhabi', 'sharjah', 'alain', 'Ras Alkhaim'];
		$ar_cities = ['دبي', 'أبوظبي', 'الشارقة', 'العين', 'رأس الخيمة', 'الفجيرة', 'أم القيوين'];
		?>
	
		<div class="container table-responsive py-5">
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th><?php _e('المدينة', 'newspaper'); ?></th>
						<th><?php _e('صلاة الفجر', 'newspaper'); ?></th>
						<th><?php _e('الشروق', 'newspaper'); ?></th>
						<th><?php _e('صلاة الظهر', 'newspaper'); ?></th>
						<th><?php _e('صلاة العصر', 'newspaper'); ?></th>
						<th><?php _e('صلاة المغرب', 'newspaper'); ?></th>
						<th><?php _e('صلاة العشاء', 'newspaper'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($ar_cities as $key => $city) :
						$api_response = fetch_prayer_times($city);
	
						// Check if the API response is valid
						if (!$api_response) {
							// Handle the error, for example, display a message or log it
							continue;
						}
						?>
						<tr>
							<th rowspan="<?php echo count($api_response['items']); ?>"><?php echo apply_filters('wpml_translate_single_string', $city, 'newspaper', $city . 'city'); ?></th>
							<?php foreach ($api_response['items'] as $item) : ?>
								<td><?php echo $item['fajr']; ?></td>
								<td><?php echo $item['shurooq']; ?></td>
								<td><?php echo $item['dhuhr']; ?></td>
								<td><?php echo $item['asr']; ?></td>
								<td><?php echo $item['maghrib']; ?></td>
								<td><?php echo $item['isha']; ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php
	}
	
	add_shortcode('prayer_time', 'display_prayer_times_table');
	
