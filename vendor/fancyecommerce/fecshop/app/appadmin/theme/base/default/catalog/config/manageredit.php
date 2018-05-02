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
    <form method="post" action="<?= $saveUrl ?>" class="pageForm required-validate" onsubmit="return validateCallback(this);">
        <input type="hidden" value="<?= $type ?>" size="30" name="editFormData[type]">
        <input type="hidden" value="<?= $one['_id'] ?>" size="30" name="editFormData[_id]">
        <?php echo CRequest::getCsrfInputHtml(); ?>
        <div layouth="56" class="" style="height: 485px; overflow: auto;">

            <fieldset id="fieldset_table_qbe">
                <legend style="color:#cc0000">编辑信息</legend>
                <div>
                    <div class="edit_p" style="padding-bottom: 10px;">
                        <label style="width: 50px;display: inline-block">Telphone：</label>
                        <input type="text" value="<?= $one['content']['telphone'] ?>" size="30" name="editFormData[telphone]" class="required">
                    </div>
                    <div class="edit_p" style="padding-bottom: 10px;">
                        <label style="width: 50px;display: inline-block">Email：</label>
                        <input type="text" value="<?= $one['content']['email'] ?>" style="width: 300px;" name="editFormData[email]" class="">
                    </div>
                    <div class="edit_p" style="padding-bottom: 10px;">
                        <label style="width: 50px;display: inline-block">Content：</label>
                        <textarea class="editor" name="editFormData[body]" style="width: 80%;height: 500px"><?= $one['content']['body'] ?></textarea>
                    </div>
                </div>
            </fieldset>

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

