<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appadmin\modules\Catalog\block\productinfo;

use Yii;
use yii\base\InvalidValueException;

/**
 * block cms\article.
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Imageupload
{
    public function upload()
    {
        if (empty($_FILES)) {
            throw new InvalidValueException('$_FILES is empty.');
        }
        $index = 0;        //$_FILES 以文件name为数组下标，不适用foreach($_FILES as $index=>$file)
        $post = Yii::$app->request->post();
        if ($post['thisindex']) {
            $rel_index = $post['thisindex'];
        } else {
            $rel_index = $index;
        }
        $img_str = '';
        foreach ($_FILES as $FILE) {
            $saveImgInfo = Yii::$service->product->image->saveProductUploadImg($FILE);
            $rel_index++;
            if (is_array($saveImgInfo) && !empty($saveImgInfo)) {
                list($imgSavedRelativePath, $imgUrl) = $saveImgInfo;
                $img_str .= '<tr class="p_img" rel="' . $rel_index . '" style="border-bottom:1px solid #ccc;">
								<td style="width:120px;text-align:center;"><img  rel="' . $imgSavedRelativePath . '" style="width:100px;height:100px;" src="' . $imgUrl . '"></td>
								<td style="width:220px;text-align:center;"><input style="height:10px;width:200px;" type="text" class="image_label" name="image_label"  /></td>
								<td style="width:220px;text-align:center;"><input style="height:10px;width:200px;" type="text" class="sort_order"  name="sort_order"  /></td>
								<td style="width:30px;text-align:center;"><input type="radio" name="image"  value="' . $imgSavedRelativePath . '" /></td>
                                <td style="width:220px;text-align:center;">
                                    <select name="is_thumbnails" class="is_thumbnails">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </td>
                                <td style="width:220px;text-align:center;">
                                    <select name="is_detail" class="is_detail">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </td>
                                <td style="padding:0 0 0 20px;"><a class="delete_img btnDel" href="javascript:void(0)">删除</a></td>
							</tr>';
            }
            $index++;
        }
        echo json_encode([
            'return_status' => 'success',
            'img_str' => $img_str,
            'img_url' =>$imgUrl,
        ]);
    }


    /*
     * 附件
     */
    public function attachmentupload()
    {
        $root_path = '../../';
        require $root_path . 'src/UploadFile.php';
        $file_path = Yii::$service->image->getImgDir('attachment');
        $upload = new \UploadFile();
        $upload->savePath = $file_path;// 设置附件上传目录   默认上传目录为 ./uploads/
        $upload->changeName = false;
        $upload->uploadReplace = true;
        if (!$upload->upload()) {
            // 上传错误提示错误信息
            exit(json_encode(['return_status' => 'failure', 'msg' => $upload->getErrorMsg()]));
        } else {
            // 上传成功 获取上传文件信息
            $fileInfo = $upload->getUploadFileInfo();
        }
        $fileInfo = $fileInfo[0];
        $str = '<tr class="p_img" data="'.$fileInfo['name'].'"  style="border-bottom:1px solid #ccc;">
									<td style="width:120px;text-align:center;"><a href="'.Yii::$service->image->getImgUrl('attachment/'.$fileInfo['savename']).'">'.$fileInfo['name'].'</a> </td>
									<td style="padding:0 0 0 20px;"><a class="attachment_delete_img btnDel" href="javascript:void(0)">删除</a></td>
								</tr>';
        echo json_encode([
            'return_status' => 'success',
            'img_str' => $str,
            'imag_url'=>Yii::$service->image->getImgUrl('attachment/'.$fileInfo['savename']),
        ]);
    }
}
