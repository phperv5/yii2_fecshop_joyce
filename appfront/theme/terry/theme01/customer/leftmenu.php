<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<div class="main_left">

    <div class="col_d_t">My Account</div>
    <div class="col_d_m">
        <div class="blank5px"></div>
        <?php if (!empty($leftMenuArr) && is_array($leftMenuArr)): ?>
            <?php foreach ($leftMenuArr as $one): ?>
                    <div class="ml_dir <?php if($one['current']) echo 'ml_dir_cur';?>">
                        <a href="<?= $one['url'] ?>"><?= Yii::$service->page->translate->__($one['name']); ?></a>
                    </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="blank5px"></div>
    </div>
    <div class="col_d_b"></div>

    <div class="blank10px"></div>


    <div class="fun_column px11 gray word_wrap word_break">
        <div class="clear"></div>

        <!-- 账户信息-->
        <b class="px14">Welcome!</b><br/> <b class="px12"><?php echo Yii::$app->user->identity->firstname;?>&nbsp;&nbsp;<?php echo Yii::$app->user->identity->lastname;?></b><br/>User ID: <span class=""><?php echo Yii::$app->user->identity->email;?></span><br/>E-Mail: <span class=""><?php echo Yii::$app->user->identity->email;?></span><br/>Account Status:<b>Normal</b><br/>
        <!-- 账户信息-->
        <div class="dashed5px"></div>
        <div class="align_right">
            <a href="<?= Yii::$service->url->getUrl('customer/account/logout') ?>">
                <img src="<?= Yii::$service->image->getImgUrl('images/ico/logout.gif'); ?>" hspace="5" border="0" align="absmiddle"/>Sign out
            </a>&nbsp;&nbsp;
        </div>
        <div class="clear"></div>
    </div>

    <div class="blank10px"></div>


    <div class="fun_column px11 gray">
        <b class="px14">Need help?</b><br/>
        If you have questions or need help with your account, you may goto "<a href="<?= Yii::$service->url->getUrl('help') ?>" target="_blank">Help</a>" or <a href="<?=  Yii::$service->url->getUrl('contact-us') ?>" target="_blank">contact us</a> to assist you.
        <div class="clear"></div>
    </div>
</div>