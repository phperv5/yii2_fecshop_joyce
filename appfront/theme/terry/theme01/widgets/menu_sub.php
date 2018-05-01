<div class="hd_menu">
    <a href="/" class="hd_menu_nv_gohome">Home</a>
    <div class="hd_menu_cate">
        <div class="hd_wr_nav"><a href="/search/" rel="nofollow"><strong>OBD2 Categories</strong></a>
            <ul class="hdcate">
                <?php $categories = Yii::$service->category->menu->getChildCate('0');?>
                <?php foreach($categories as $category): ?>
                    <a href="<?= $category['url'] ?>" class="mhl_first"><?= $category['name'] ?></a>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="hd_menu_brands">
        <div class="hd_wr_nav"><a href="/search/" rel="nofollow"><b>Brands</b></a>
            <ul class="hdbrands">
                <?php $categories = Yii::$service->category->menu->getBrand();?>
                <?php foreach($categories as $category): ?>
                    <a href="<?= $category['url'] ?>">
                        <img src="<?= Yii::$service->category->image->getBaseUrl().$category['thumbnail_image'] ?>" width="120" height="40" border="0" hspace="0" vspace="0" alt="<?= $category['name'] ?>" align="absmiddle"/>
                    </a>
                <?php endforeach; ?>
                <div class="clear"></div>
            </ul>
        </div>
    </div>

    <div class="hd_menu_nav">
        <?php foreach ($categoryArr as $category1): ?>
            <a class="" href="<?= $category1['url'] ?>"><?= $category1['name'] ?></a>
        <?php endforeach; ?>
    </div>
</div>