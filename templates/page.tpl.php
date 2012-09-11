<div id="main-header">
	<div id="logo"><a href="/"><img src="<?php print $logo; ?>" /></a></div>	
	<?php print render($page['header']); ?>
</div>
	
<div id="container" class="clearfix">
	<?php if ($messages): ?>
		<div id="messages">
			<?php print $messages; ?>
		</div>
	<?php endif; ?>
	
		
	<?php if ($tabs): ?>
		<div class="tabs">
			<?php print render($tabs); ?>
		</div>
	<?php endif; ?>
	
  
	<div id="main-content">
		<?php print render($page['content']); ?>
	</div>
		
</div>

<div id="footer" class="clearfix">
	<div id="footer-main" class="clearfix">
		<?php if($page['footer_left']): ?>
		<div id="footer-left" class="clearfix">
			<?php print render($page['footer_left']); ?>
		</div>
		<?php endif; ?>
		<?php if($page['footer_middle']): ?>
		<div id="footer-middle" class="clearfix">
			<?php print render($page['footer_middle']); ?>
		</div>
		<?php endif; ?>
		<?php if($page['footer_right']): ?>
		<div id="footer-right" class="clearfix">
			<?php print render($page['footer_right']); ?>
		</div>
		<?php endif; ?>
	</div>
	<div id="footer-bottom" class="clearfix">
		&copy; 2012. <?php print render($page['footer_bottom']); ?>
	</div>
</div>





