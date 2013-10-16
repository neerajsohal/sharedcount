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
				        <button class="btn btn-default input-lg" type="submit">Go</button>
				      </span>
				    </div>
				    <span class="help-block">Enter a valid url for which you want to see the social sharing counts.</span>
				    <?php echo form_error('url'); ?>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<?php if(isset($counts)) { ?>
	<div class="container prepend-top">
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
					<tr>
						<th colspan="2">
							<?php echo anchor('http://facbeook.com/', 'Facebook', 'target="_blank"'); ?>
						</th>
					</tr>
					<tr>
						<td>
							<span class="lead droidFont">Shares: <strong><?php echo $counts['facebook']['shares']; ?></strong></span>
						</td>
						<td>
							<span class="lead droidFont">Comments: <strong><?php echo $counts['facebook']['comments']; ?></strong></span>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<small><?php echo anchor('http://graph.facebook.com/'.$url,'http://graph.facebook.com/'.$url, 'target="_blank"'); ?></small>
						</td>
					</tr>
				</table>
				<table class="table">
					<tr>
						<th colspan="2">
							<?php echo anchor('http://twitter.com/', 'Twitter', 'target="_blank"'); ?>
						</th>
					</tr>
					<tr>
						<td colspan="2">
							<span class="lead droidFont">Shares: <strong><?php echo $counts['twitter']->count; ?></strong></span>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<small><?php echo anchor('https://cdn.api.twitter.com/1/urls/count.json?url='.$url,'https://cdn.api.twitter.com/1/urls/count.json?url='.$url, 'target="_blank"'); ?></small>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php } ?>

</div>




<?php $this->load->view('globals/footer'); ?>
