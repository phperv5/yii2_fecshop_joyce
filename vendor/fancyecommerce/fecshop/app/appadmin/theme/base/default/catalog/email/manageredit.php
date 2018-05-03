<?php

use yii\helpers\Html;
use fec\helpers\CRequest;
use fecadmin\models\AdminRole;
use fec\helpers\CUrl;
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
          onsubmit="return validateCallback(this);">
        <?php echo CRequest::getCsrfInputHtml(); ?>
        <div layouth="56" class="" style="height: 485px; overflow: auto;">

            <fieldset id="fieldset_table_qbe">
                <legend style="color:#cc0000">编辑信息</legend>
                <div>
                    <div class="edit_p" style="padding-bottom: 10px;">
                        <label style="width: 50px;display: inline-block">To：</label>
                        <input type="text" value="<?= $to ?>" size="30" name="editForm[to]" >
                        <label style="width: 50px;display: inline-block">群发：</label>
                        <input type="checkbox" name="editForm[toall]">
                    </div>
                    <div class="edit_p" style="padding-bottom: 10px;">
                        <label style="width: 50px;display: inline-block">Subject：</label>
                        <input type="text" value="" style="width: 300px;" name="editForm[subject]" class="">
                    </div>
                    <div class="edit_p" style="padding-bottom: 10px;">
                        <label style="width: 50px;display: inline-block">Body：</label>
                        <textarea upimgurl="<?= CUrl::getUrl('cms/staticblock/imageupload');?>" upimgext="jpg,jpeg,gif,png" class="editor" name="editForm[htmlBody]" style="width: 80%;height: 500px" class="required" ></textarea>
                    </div>
                </div>
            </fieldset>

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

