<?php

class DefaultController extends Controller
{
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('connector'),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
        
    public function actionConnector()
	{
        $this->layout=false;
        
        Yii::import('elfinder.vendors.*');
        require_once('elFinder.class.php');

        $opts=array(
            'root'=> Yii::getPathOfAlias('frontend') .'/www/uploads/',
            'URL'=> str_replace( 'admin.', '', app()->request->hostInfo) .'/uploads/',
            'rootAlias'=>t('Home', 'elfinder'),
            'tmbDir'=>'thumb',
        );

        $fm=new elFinder($opts);
        $fm->run();
	}
}