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
use fec\helpers\CUrl;

?>
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
          onsubmit="return validateCallback(this, dialogAjaxDoneCloseAndReflush);">
        <?php echo CRequest::getCsrfInputHtml(); ?>
        <div layouth="56" class="pageFormContent" style="height: 240px; overflow: auto;">
            <fieldset id="fieldset_table_qbe">
                <legend style="color:#cc0000">编辑信息</legend>
                <div>
                    <?= $editBar; ?>
                </div>
            </fieldset>
            <div>
                <table  class="productattach">
                    <tbody>
                    </tbody>
                </table>
                <button style="" onclick="getElementById('attachfile').click()" class="scalable" type="button"
                        title="Duplicate" id=""><span><span><span>上传图片</span></span></span></button>
                <input type="file" multiple="multiple" id="attachfile"
                       style="height:0;width:0;z-index: -1; position: absolute;left: 10px;top: 5px;"/>
                <script>
                    jQuery(document).ready(function () {

                        //响应文件添加成功事件
                        $("#attachfile").change(function () {

                            //创建FormData对象
                            var thisindex = 0;
                            jQuery(".productattach tbody tr").each(function () {
                                rel = parseInt(jQuery(this).attr("rel"));
                                //alert(rel);
                                if (rel > thisindex) {
                                    thisindex = rel;
                                }
                            });
                            //alert(thisindex);
                            var data = new FormData();
                            data.append('thisindex', thisindex);

                            //为FormData对象添加数据
                            $.each($('#attachfile')[0].files, function (i, file) {
                                data.append('upload_file' + i, file);
                            });
                            //$(".loading").show();	//显示加载图片
                            //发送数据


                            $.ajax({
                                url: '<?= CUrl::getUrl('catalog/productinfo/imageupload')  ?>',
                                type: 'POST',
                                data: data,
                                async: false,
                                dataType: 'json',
                                timeout: 80000,
                                cache: false,
                                contentType: false,		//不可缺参数
                                processData: false,		//不可缺参数
                                success: function (data, textStatus) {
                                    //data = $(data).html();
                                    //第一个feedback数据直接append，其他的用before第1个（ .eq(0).before() ）放至最前面。
                                    //data.replace(/&lt;/g,'<').replace(/&gt;/g,'>') 转换html标签，否则图片无法显示。
                                    //if($("#feedback").children('img').length == 0) $("#feedback").append(data.replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
                                    //else $("#feedback").children('img').eq(0).before(data.replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
                                    //	alert(data.return_status);
                                    if (data.return_status == "success") {
                                        var str = '<img src="'+data.img_url+'" style="width: 100px;"/>'
                                        jQuery(".productattach tbody ").empty().append(str);
                                        $('[name="editFormData[banner_url]"]').val(data.img_url);
                                    } else {
                                        alert(data.msg);
                                    }
                                },
                                error: function () {
                                    alert('上传出错');
                                    //$(".loading").hide();	//加载失败移除加载图片
                                }
                            });
                        });
                    });
                </script>
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

