<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
use fec\helpers\CRequest;
/** 
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
?>

<form id="pagerForm" method="post" action="<?= \fec\helpers\CUrl::getCurrentUrl();  ?>">
	<?=  CRequest::getCsrfInputHtml();  ?>
	<?=  $pagerForm;  ?>
</form>
<style>
    .grid .gridTbody td div{
        height: 100px;
        line-height: 100px;
    }
</style>
<div class="pageContent">
	<div class="panelBar">
		<?= $editBar;  ?>
	</div>
	<div class="panelBar">
		<?= $toolBar; ?>
	</div>
	<table class="table" width="100%" layoutH="138">
		<?= $thead; ?>
		<tbody>
			<?= $tbody; ?>
		</tbody>
	</table>
	
</div>
