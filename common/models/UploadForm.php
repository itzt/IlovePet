<?php
/**
 * 公共文件上传
 */
namespace common\models;

use yii\base\Model;

class UploadForm extends Model
{
	public $imgFile;
	/**
	 * 验证规则
	 * @return [type] [description]
	 */
	public function rules()
    {
        return [
            [['imgFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * 上传方法
     */
    public function upload()
    {
    	if($this->validate())
    	{
    	    $path = $this->uploadFilePath(); //文件上传路径
    		$fileName = $path .uniqid() .rand(1000,9999) .'.' .$this->imgFile->extension;
    		$this->imgFile->saveAs($fileName);
            return $fileName;
    	}
    	else
    	{
    		return false;
    	}
    }
    /**
     * 文件的上传路径
     */
    protected function uploadFilePath()
    {
        $path = './uploads/' .date('Y-m-d'). '/';
        if(!file_exists($path))
        {
            mkdir($path, 0777, true);
        }
        return $path;
    }


}