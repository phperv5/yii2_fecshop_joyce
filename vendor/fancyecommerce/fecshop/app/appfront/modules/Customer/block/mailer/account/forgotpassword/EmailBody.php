<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\app\appfront\modules\Customer\block\mailer\account\forgotpassword;

use fecshop\app\appfront\helper\mailer\Email;
use Yii;

/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class EmailBody
{
    public $params;

    public function getLastData()
    {
        $identity = $this->params;
        $resetUrl = Yii::$service->url->getUrl('customer/account/resetpassword', ['resetToken'=>$identity['password_reset_token']]);

        return [
            'name'        => $identity['firstname'].' '. $identity['lastname'],
            'email'        => $identity['email'],
            'resetUrl'    => $resetUrl,
            'storeName'            => Email::storeName(),
            'contactsEmailAddress'    => Email::contactsEmailAddress(),
            'contactsPhone'            => Email::contactsPhone(),
            'homeUrl'    => Yii::$service->url->homeUrl(),
            'logoImg'    => Yii::$service->image->getImgUrl('email/logo.png'),
            'identity'  => $identity,
        ];
    }
}
