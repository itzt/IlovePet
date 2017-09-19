<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Home controller
 */
class HomeController extends Controller
{
	public $layout = false;
	public function actionIndex()
	{
		return $this->render('index');
	}
}