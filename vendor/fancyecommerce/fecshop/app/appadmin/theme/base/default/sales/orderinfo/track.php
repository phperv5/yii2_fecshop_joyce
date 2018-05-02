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
use fecadmin\models\AdminRole;
use fecshop\app\appfront\helper\Format;

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

<div class="pageContent" style="background:#fff;">
    <form method="post" action="<?= $saveUrl ?>" class="pageForm required-validate"
          onsubmit="return validateCallback(this, dialogAjaxDoneCloseAndReflush);">
        <?php echo CRequest::getCsrfInputHtml(); ?>
        <div layouth="56" class="pageFormContent" style="height: 240px; overflow: auto;">

            <input type="hidden" size="30" name="editForm[order_id]" value="<?= $order_id ?>" class="textInput ">

            <fieldset id="fieldset_table_qbe">
                <legend style="color:#cc0000">发货</legend>
                <div>
                    <p class="edit_p">
                        <label>shipping_number：</label>
                        <span><input type="" id="shipping_number" name="editForm[shipping_number]" value="" style="width: 200px;"/></span>
                    </p>
                </div>
            </fieldset>
            <div>
                <label>delivery_remark：</label>
                <span><textarea id="delivery_remark" name="editForm[delivery_remark]" style="width: 300px;height: 100px;"></textarea></span>
            </div>
            <div>
                <label>默认发送邮件：</label>
                <span><input type="checkbox" name="editForm[is_email_status]" value="1" checked/></span>
            </div>
        </div>

        <div class="formBar">
            <ul>
                <!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
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


