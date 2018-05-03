<div class="hd_menu hd_menu_home">
    <div class="hd_menu_home_cate">OBD2 Categories</div>
    <div class="hd_menu_brands">
        <div class="hd_wr_nav"><a href="search/search.html"><b>Brands</b></a>
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
<div class="clear"></div>
