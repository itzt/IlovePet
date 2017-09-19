<?php
namespace backend\models;

use yii\base\Model;
use backend\models\Admin;

/**
 * 修改密码
 */
class SavePwd extends Model
{

    /**
     * Signs user up.
     *
     * @return Admin|null the saved model or null if saving fails
     */
    public function savePwd($password)
    {
        $admin = new Admin();
        $admin->setPassword($password);
        $admin->generateAuthKey();
        return $admin;
    }
}
