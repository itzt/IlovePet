<?php
/**
 * 后台管理控制器
 */
namespace backend\controllers;

header('content-text:text/html;charset=utf-8');
use yii;
use yii\web\Controller;
use backend\models\Admin;
use yii\filters\AccessControl;
use common\models\UploadForm;
use yii\web\UploadedFile;
use common\helpers\Tools;
use common\models\Count;


/**
 * Admin controller
 */
class AdminController extends Controller
{
	/**
	 * ACF 认证
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'actions' => [],
    //                     'allow'   => true,
    //                     'roles'   => ['?'],
    //                 ],
    //                 [
    //                     'actions' => [],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //     ];
    // }

	// 后台默认页面
	public function actionIndex()
	{
        $levelTop = (new \yii\db\Query())->select('level,username')->from('pet_count as c')->leftJoin('pet_admin as a', 'c.user_id=a.id')->orderBy('level desc')->limit('10')->all(); //等级排行前十

        $activiTop = (new \yii\db\Query())->select('activity_count,username')->from('pet_count as c')->leftJoin('pet_admin as a', 'c.user_id=a.id')->orderBy('level desc')->limit('10')->all(); //活跃排行前十

		return $this->render('index', ['levelTop' => $levelTop, 'activiTop' => $activiTop]);
	}

    /**
     * 管理员信息修改
     */
    public function actionInfo()
    {
        $admin = new Admin(['scenario' => 'update']);
        $adminInfo = yii::$app->session->get('adminInfo');
        $userName = $adminInfo['LoginForm']['username']; //获取用户名称
        $findOne = $admin->find()->where(['username' => $userName])->one();
        $model = new UploadForm;
        if(yii::$app->request->isPost)
        {
            $post = yii::$app->request->post();
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            //如果提交过来的信息，不是空的文件信息
            if(!empty($model->imgFile))
            {
                //如果当前管理员已有头像，则删除原先，并替换
                if(!empty($findOne['image']))
                {
                    unlink($findOne['image']); //删除原先的图片
                }
                $fileName = $model->upload(); //返回文件路径
                $findOne->image = $fileName;
            }
            $findOne->nickname = $post['Admin']['nickname'];
            $findOne->email = $post['Admin']['email'];
            $res = $findOne->save();
            if($res)
            {
                Tools::success('修改信息成功', ['admin/info']);
            }
            else
            {
                Tools::error('修改信息失败', ['admin/info']);
            }
        }
        return $this->render('info', ['model' => $model, 'findOne' => $findOne]);
    }


}