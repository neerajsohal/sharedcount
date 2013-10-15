<?php $this->load->view('globals/header'); ?>


<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Shared Count</h1>
				<hr />
				<?php echo form_open(); ?>
					<div class="input-group">
				      <input name="url" type="url" class="form-control input-lg" placeholder="enter a url e.g. http://google.com/" value="<?php echo set_value('url'); ?>" />
				      <span class="input-group-btn">
				        <button class="btn btn-default input-lg" type="button">Go</button>
				      </span>
				    </div>
				    <span class="help-block">Enter a valid url for which you want to see the social sharing counts.</span>
				    <?php echo form_error('url'); ?>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	
	<div class="container prepend-top">
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped">
					<tr>
						<td colspan="2">
							<h4>Facebook</h4>
						</td>
					</tr>
					<tr>
						<td>
							<p class="lead droidFont">Shares: <strong><?php echo $counts['facebook']->shares; ?></strong></p>
						</td>
						<td>
							<p class="lead droidFont">Comments: <strong><?php echo $counts['facebook']->comments; ?></strong></p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>


</div>




<?php $this->load->view('globals/footer'); ?>