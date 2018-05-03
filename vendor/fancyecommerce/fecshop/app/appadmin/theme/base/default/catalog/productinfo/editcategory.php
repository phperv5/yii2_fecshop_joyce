<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
use yii\helpers\Html;
use fec\helpers\CRequest;
use fec\helpers\CUrl;
use fecadmin\models\AdminRole;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
?>
<style>
    .checker {
        float: left;
    }

    .dialog .pageContent {
        background: none;
    }

    .dialog .pageContent .pageFormContent {
        background: none;
    }
</style>

<div class="pageContent">
    <form method="post" action="<?= $saveUrl ?>" class="pageForm required-validate"
          onsubmit="return thissubmit(this, dialogAjaxDoneCloseAndReflush);">
        <input type="hidden" value="<?= $_ids; ?>" name="_ids" class=""/>
        <div layouth="56" class="pageFormContent" style="height: 240px; overflow: auto;">

            <input type="hidden" value="" name="category" class="inputcategory"/>
            <ul class="category_tree tree treeFolder treeCheck expand"></ul>
        </div>

        <div class="formBar">
            <ul>
                <li>
                    <div class="buttonActive">
                        <div class="buttonContent">
                            <button onclick="func('accept')" value="accept" name="accept" type="submit">保存</button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="button">
                        <div class="buttonContent">
                            <button type="button" class="close">取消</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>
</div>
<script>
    $(document).ready(function () {
        id = '';
        getCategoryData(id, 0);

    });

    function thissubmit(thiss) {

        cate_str = "";
        jQuery(".category_tree div.ckbox.checked").each(function () {
            cate_id = jQuery(this).find("input").val();
            cate_str += cate_id + ",";
        });


        jQuery(".category_tree div.ckbox.indeterminate").each(function () {
            cate_id = jQuery(this).find("input").val();
            cate_str += cate_id + ",";
        });

        jQuery(".inputcategory").val(cate_str);

        return validateCallback(thiss, dialogAjaxDoneCloseAndReflush);
    }

    function getCategoryData(product_id, i) {
        $.ajax({
            url: '<?= CUrl::getUrl("catalog/productinfo/getproductcategory", ['product_id' => $product_id]); ?>',
            async: false,
            timeout: 80000,
            dataType: 'json',
            type: 'get',
            data: {
                'product_id': product_id,
            },
            success: function (data, textStatus) {
                if (data.return_status == "success") {
                    jQuery(".category_tree").html(data.menu);
                    // $.fn.zTree.init($(".category_tree"), subMenuSetting, json);
                    if (i) {
                        $("ul.tree", ".dialog").jTree();
                    }
                }
            },
            error: function () {
                alert('加载分类信息出错');
            }
        });
    }

</script>


