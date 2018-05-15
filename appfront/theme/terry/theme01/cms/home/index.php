
<div class="main_h">
    <div class="main_h_left">
        <?php $categories = Yii::$service->category->menu->getChildCate('0'); ?>
        <?php foreach ($categories as $category): ?>
            <div class="left_proclass_menu">
                <a href="<?= $category['url'] ?>" class="mhl_first_main"><?= $category['name'] ?></a>
                <?php $cates = Yii::$service->category->getChildCate($category['_id']); ?>
                <?php if (isset($cates) && !empty($cates)): ?>
                    <div class="hd_wr_nav_main">
                        <div style="width: 600px;background-color: #fff;border: none;box-shadow: 3px 3px 3px #E1E1E1;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <?php foreach ($cates as $k => $c): ?>
                                    <?php if ($k % 3 == 0): ?>
                                        <tr>
                                    <?php endif; ?>
                                    <td><a href="<?= $c['url_key']; ?>"
                                           target="_blank"><?= $c['name']['name_en']; ?></a></td>
                                    <?php if ($k % 3 == 0): ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="main_h_banner">
        <div id="hm_ads_banner_a2" class="owl-carousel">
            <?php
            $ads = Yii::$service->product->ads->getAdList();
            foreach ($ads as $v):?>
                <a class="item" target="_blank" href="<?= $v['url'] ?>"><img src="<?= $v['banner'] ?>" alt="<?= $v['title'] ?>" style="width: 960px;height:360px;"></a>
            <?php endforeach; ?>
        </div>
        <div class="hm_bnr_ndots" id="hm_bnr_dots"></div>
    </div>
    <div class="clear"></div>
    <div class="blank15px"></div>
    <div class="hm_box_jmp_right">
        <ul>
            <?php
            $middle_banner = Yii::$service->product->banner->getList('middle_position',4);
            foreach($middle_banner as $v):
            ?>
            <li>
                <a href="<?= $v['url'] ?>"><img src="<?= $v['banner_url'] ?>" border="0" alt="<?= $v['title'] ?>"></a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="main">
    <!--    new arrivals-->
    <?php
    $parentThis['products'] = $newArrivals;
    $parentThis['name'] = 'New Arrivals';
    $config = [
        'view' => 'cms/home/index/newArrivals.php',
    ];
    echo Yii::$service->page->widget->renderContent('category_newArrivals_price', $config, $parentThis);
    ?>

    <div class="blank10px"></div>
    <div class="hm_box hm_box_dir_tf hm_box_dir_tf_1">
        <div class="hmb_title"><h2><a href="">Original Brand Tool<span class="iconfont icon-right"></span></a></h2>
        </div>
        <div class="clear"></div>
    </div>
    <div class="hm_box">
        <?php
        $parentThis['products'] = $bestSellerProducts1;
        $parentThis['name'] = 'best-seller';
        $config = [
            'view' => 'cms/home/index/product.php',
        ];
        echo Yii::$service->page->widget->renderContent('category_product_price', $config, $parentThis);
        ?>
        <div class="clear"></div>
    </div>
    <div class="blank10px"></div>
    <div class="blank10px"></div>
    <div class="hm_box hm_box_dir_tf hm_box_dir_tf_2">
        <div class="hmb_title"><h2><a href="">Car Diagnostic Tool<span class="iconfont icon-right"></span></a></h2>
        </div>
        <div class="clear"></div>
    </div>
    <div class="hm_box">
        <?php
        $parentThis['products'] = $bestSellerProducts2;
        $parentThis['name'] = 'best-seller';
        $config = [
            'view' => 'cms/home/index/product.php',
        ];
        echo Yii::$service->page->widget->renderContent('category_product_price', $config, $parentThis);
        ?>
        <div class="clear"></div>
    </div>
    <div class="blank10px"></div>
    <div class="blank10px"></div>
    <div class="hm_box hm_box_dir_tf hm_box_dir_tf_3">
        <div class="hmb_title"><h2><a href="">Auto Key Programmer<span class="iconfont icon-right"></span></a></h2></div>
        <div class="clear"></div>
    </div>
    <div class="hm_box">
        <?php
        $parentThis['products'] = $bestSellerProducts3;
        $parentThis['name'] = 'best-seller';
        $config = [
            'view' => 'cms/home/index/product.php',
        ];
        echo Yii::$service->page->widget->renderContent('category_product_price', $config, $parentThis);
        ?>
        <div class="clear"></div>
    </div>
    <div class="blank10px"></div>
    <div class="blank10px"></div>
    <div class="hm_box hm_box_dir_tf hm_box_dir_tf_4">
        <div class="hmb_title"><h2><a href="">ECU Chip Tuning<span class="iconfont icon-right"></span></a></h2>
        </div>
        <div class="clear"></div>
    </div>
    <div class="hm_box">
        <?php
        $parentThis['products'] = $bestSellerProducts4;
        $parentThis['name'] = 'best-seller';
        $config = [
            'view' => 'cms/home/index/product.php',
        ];
        echo Yii::$service->page->widget->renderContent('category_product_price', $config, $parentThis);
        ?>
        <div class="clear"></div>
    </div>
    <div class="blank10px"></div>

</div>

<script>
    <?php $this->beginBlock('owl_fecshop_slider') ?>

    $(document).ready(function () {
        var owl = $('#hm_ads_banner_a2');
        owl.owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: true,
            dotsContainer: $('#hm_bnr_dots'),
            dotClass: 'hm_bnr_dot',
            autoplay: true,
            autoplayTimeout: 3000
        });

        $(".left_proclass_menu").bind('mouseover', function () {
            $(this).find('.hd_wr_nav_main').show();
        })
        $(".left_proclass_menu").bind('mouseout', function () {
            $('.hd_wr_nav_main').hide();
        })

        $.ajax({
            url: '/cms/home/sidebar',
            type: 'get',
            async: true,
            dataType: 'html',
            success: function (data, textStatus) {
                $("body").append(data);
            },
        });

    });
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['owl_fecshop_slider'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>