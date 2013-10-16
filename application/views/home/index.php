<?php $this->load->view('globals/header'); ?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
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
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?php echo anchor('http://facbeook.com/', 'Facebook', 'target="_blank"'); ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['facebook']['share_count']; ?></span>
				</div>
				<div class="text">
					shares
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['facebook']['like_count']; ?></span>
				</div>
				<div class="text">
					like count
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['facebook']['comment_count']; ?></span>
				</div>
				<div class="text">
					comment count
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['facebook']['total_count']; ?></span>
				</div>
				<div class="text">
					total count
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['facebook']['commentsbox_count']; ?></span>
				</div>
				<div class="text">
					commentsbox count
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['facebook']['click_count']; ?></span>
				</div>
				<div class="text">
					click count
				</div>
			</div>
		</div>
	</div>
	<p><small><?php echo anchor('http://graph.facebook.com/'.$url,'http://graph.facebook.com/'.$url, 'target="_blank"'); ?></small></p>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?php echo anchor('http://twitter.com/', 'Twitter', 'target="_blank"'); ?></h3>
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['twitter']->count; ?></span>
				</div>
				<div class="text">
					count
				</div>
			</div>
			<p><small><?php echo anchor('https://cdn.api.twitter.com/1/urls/count.json?url='.$url,'https://cdn.api.twitter.com/1/urls/count.json?url='.$url, 'target="_blank"'); ?></small></p>
		</div>
	</div>
	
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?php echo anchor('http://pinterest.com/', 'Pinterest', 'target="_blank"'); ?></h3>
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['pinterest']->count; ?></span>
				</div>
				<div class="text">
					count
				</div>
			</div>
			<p><small><?php echo anchor('http://api.pinterest.com/v1/urls/count.json?callback=&url='.$url,'http://api.pinterest.com/v1/urls/count.json?callback=&url='.$url, 'target="_blank"'); ?></small></p>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?php echo anchor('http://linkedin.com/', 'Linkedin', 'target="_blank"'); ?></h3>
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['linkedin']->count; ?></span>
				</div>
				<div class="text">
					count
				</div>
			</div>
			<p><small><?php echo anchor('http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json','http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json', 'target="_blank"'); ?></small></p>
		</div>
	</div>			
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?php echo anchor('http://stumbleupon.com/', 'StumbleUpon', 'target="_blank"'); ?></h3>
			<div class="count">
				<div class="number">
					<span class="droidFont"><?php echo $counts['stumbleupon']['result']['views']; ?></span>
				</div>
				<div class="text">
					views
				</div>
			</div>
			<p><small><?php echo anchor('http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json','http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json', 'target="_blank"'); ?></small></p>
		</div>
	</div>
</div>
<?php } ?>

<?php $this->load->view('globals/footer'); ?>
