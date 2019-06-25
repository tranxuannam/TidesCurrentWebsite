<?php

	$message = '';

	if ( isset( $_POST['submit'] ) ) {
		$count = rebuild_permalinks( $_POST['posttype'] );
		$message = $count . ' permalinks were rebuilt for all posts of type: <strong>' . $_POST['posttype'] . '</strong>';
	}
?>

	<div class="wrap" id="rebuild-permalinks-settings">
		<?php screen_icon(); ?>
		<h2><?php _e('Rebuild Permalinks', 'rebuild-permalinks'); ?></h2>

<?php if ( $message !== '' ) : ?>
		
		<div id="message" class="updated fade">
			<p>
				<?php _e($message, 'rebuild-permalinks'); ?>
			</p>
		</div>

<?php endif; ?>
		
		<form action="" method="post" id="rebuild_permalinks_form">
			
			<table class="form-table">
				
				<tr>
					<th scope="row">
						<label for="posttype"><?php _e('Select Post Type', 'rebuild-permalinks'); ?></label>
					</th>
					<td>
						<select name="posttype">
<?php
	$posttypes = get_post_types( array( 'public' => true ), 'names' );
	foreach( $posttypes as $posttype ) :
?>
							<option value="<?php echo $posttype; ?>"><?php echo ucfirst( strtolower( $posttype ) ); ?></option>
<?php
	endforeach;
?>
						</select>
					</td>
				</tr>
				
			</table>

			<p><?php _e('Make sure you have a backup of your WordPress database before rebuilding permalinks!', 'rebuild-permalinks'); ?></p>
			<p>
				<input type="submit" name="submit" class="button-primary" style="width: 300px;" value="<?php _e('Rebuild Selected Permalinks', 'rebuild-permalinks'); ?>"
							 onclick='if (!window.confirm("<?php _e('Are you sure you want to do this?', 'rebuild-permalinks'); ?>")) return false;'>
			</p>

		</form>
		
	</div>
