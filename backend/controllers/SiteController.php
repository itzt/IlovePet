<?php
/**
 * 框架自带控制器
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\LoginForm;
use backend\models\SavePwd;
use backend\models\Admin;
use common\helpers\Tools;

/**
 * Site controller
 */
class SiteController extends AdminController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main_copy.php';
        $this->layout = false;
        return $this->render('index');
    }

    /**
     * Login action.
     * 登录页面（默认页面）
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'signin.php';
        $model = new LoginForm();
        if(Yii::$app->request->isPost)
        {
            if (!Yii::$app->user->isGuest) {
                return $this->redirect(['admin/index']);
                // return $this->goHome();
            }
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                //记录当前用户信息
                yii::$app->session->set('adminInfo', Yii::$app->request->post());
                return $this->redirect(['admin/index']);
                // return $this->goBack();
            } else {
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }
        else
        {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * 忘记密码(找回管理员密码)
     */
    public function actionForgetspwd()
    {
        $this->layout = 'signin';
        $admin = new Admin(['scenario'=>'sendmail']);
        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            if($admin->load($post) && $admin->validate())
            {
                // 1.验证Email 是否存在
                $adminOne = Admin::findOne(['email'=>$admin->email]);
                if($adminOne)
                {
                    $timestamp = time();
                    $token = $this->createToken($timestamp,$admin->email);
                    // 2.发送Email
                     $res = Yii::$app->mailer->compose('passwordreset',['timestamp'=>$timestamp,'email'=>$admin->email,'token'=>$token,'adminname'=>$admin->username])
                         ->setFrom(['1411751991@qq.com' => 'M.Z SHOP'])
                         ->setTo($admin->email)
                         ->setSubject('Mr.Z商城找回密码.')
                         ->send();
                    Tools::success('发送Email成功，请查收.', '', 'false');
                }
                else
                {
                    $admin->addError('email','Email 不存在.请三思.');
                }
            }
        }
        return $this->render('forgetspwd',['admin'=>$admin]);
    }

    /**
     * 邮箱重置密码
     */
    public function actionSavepwd()
    {
        $this->layout = 'signin';
        // 效验URL是否是我们服务器发送的
        // 1. 效验时间 15分以内
        $timestamp = Yii::$app->request->get('timestamp');
        $email = Yii::$app->request->get('email');
        $token = Yii::$app->request->get('token');
        if((time() - $timestamp) > 900)
        {
            Tools::error('连接已经失效.','',false);
            $this->redirect(['site/forgetspwd']);
        }
        $myToken = $this->createToken($timestamp,$email);
        if($myToken != $token)
        {
            Tools::error('有问题,小伙子，不要搞事情.','',false);
            $this->redirect(['site/forgetspwd']);
        }
        $admin = Admin::findOne(['email'=>$email]);
        $admin->scenario = 'resetpwd';
        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            if($admin->load($post) && $admin->validate())
            {
                // 重置
                $admin->setPassword($admin->password);
                if($admin->save())
                {
                    Tools::success('密码修改成功.', ['site/login']);
                }
                else
                {
                    Tools::error('密码修改失败.','',false);
                }
            }
        }
        return $this->render('savepwd',['admin'=>$admin]);
    }
    protected function createToken($time,$email)
    {
        return md5(base64_encode(Yii::$app->request->userIP) . base64_encode($email) .base64_encode($time));
    }
    /**
     * Logs out the current user.
     * 退出登录
     * @return mixed
     */
    public function actionLogout()
    {
        $this->layout = 'signin.php';
        yii::$app->session->destroy(); //销毁session
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
