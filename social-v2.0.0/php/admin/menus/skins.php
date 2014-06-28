<div class="innerLR innerB border-bottom">
	<ul class="colors">
		<?php $i = 0; foreach ($skins as $skin => $color): $i++; if ($i>100) break; ?>
		<li<?php if ((!isset($_GET['skin']) && $skin == 'style-default') || (isset($_GET['skin']) && $_GET['skin'] == $skin)): ?> class="active"<?php endif; ?>><a href="?<?php echo http_build_query(array_merge($_GET, array('skin'=>$skin))); ?>" style="background-color: <?php echo is_array($color) ? $color['primaryColor'] : $color; ?>" class="no-ajaxify innerAll half"><span class="hide"><?php echo $skin; ?></span></a></li>
		<?php endforeach; ?>
	</ul>
</div>