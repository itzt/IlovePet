<?php

$info = yii::$app->session->getFlash('info');
$url = isset($info['url']) ? $info['url'] : null;
$skit = $info['skit'];
$time = isset($info['time']) ? $info['time'] : '';
?>



<?php if (isset($info) && ($info['state'] == 0)): ?>
	

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> <?= $info['msg'];?>,
  <?php if ($skit == false): ?>
  		......
  	<?php else: ?>
  		<span id="wait"><?= $time;?></span>后跳转
  <?php endif ?>
</div>

<?php elseif(isset($info) && ($info['state'] == 1)): ?>

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?= $info['msg']?>,<span id="wait"><?= $time;?></span>后跳转
</div>

<?php endif ?>



<?php if (isset($info['url']) && $skit): ?>
	<script>
		setInterval(function()
		{
			var wait = document.getElementById('wait').innerHTML;
			wait -= 1;
			document.getElementById('wait').innerHTML = wait;
			if(wait == 0)
			{
				<?php if (empty($url)): ?>
					window.history.go(-1);
				<?php else: ?>
					window.location.href = '<?= $url?>';
				<?php endif ?>
			}
		}, 1000);
	</script>
<?php endif ?>
