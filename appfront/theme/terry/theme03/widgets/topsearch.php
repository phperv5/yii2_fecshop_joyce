<div class="hd_sch">
    <form method="get" name="searchFrom" class="js_topSeachForm" action="<?= Yii::$service->url->getUrl('catalogsearch/index');   ?>">
        <input name="q" type="text" id="q" class="kw"  value="<?=  \Yii::$service->helper->htmlEncode(Yii::$app->request->get('q'));  ?>"
               placeholder="<?= Yii::$service->page->translate->__('Products keyword'); ?>">
        <select name="DirID">
            <option value="" style="color:#999;">all categories</option>
            <?php $categories = Yii::$service->category->menu->getChildCate('0');?>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category['url'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="" class="go fl js_topSearch seachBtn" title="Search"/>
    </form>
</div>