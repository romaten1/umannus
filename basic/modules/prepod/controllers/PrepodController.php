<?php

namespace app\modules\prepod\controllers;

use Yii;
use app\modules\prepod\models\Prepod;
use app\modules\prepod\models\PrepodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\faculty\models\Faculty;
use app\modules\cafedra\models\Cafedra;
//use yii\helpers\Security;
use yii\web\UploadedFile;
use \wapmorgan\UnifiedArchive\UnifiedArchive;
/**
 * PrepodController implements the CRUD actions for Prepod model.
 */
class PrepodController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Prepod models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrepodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdmin()
    {
        $searchModel = new PrepodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prepod model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prepod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prepod();

        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image_id = UploadedFile::getInstances($model, 'image_id');
            var_dump($image_id);
            // store the source file name
            /*$zip = new ZipArchive(); // подгружаем библиотеку zip
            $zip_name = '@umannus/uploads/prepods'.time().".zip"; // имя файла
            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
            {

                $error .= "* Sorry ZIP creation failed at this time";
            }*/
            foreach ($image_id as $key => $value) {
                $filename = $value->name;
                $ext = end((explode(".", $value->name)));
                // generate a unique file name
                $model->image_id = Yii::$app->getSecurity()->generateRandomString().".{$ext}";
               //echo $model->image_id.'<br />'; 
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->basePath . '/uploads/prepods/multi/' .$model->image_id;
                //echo $path.'<br />';
                $value->saveAs($path);
                //$zip->addFile($path);
                 
            }
            //$zip->close(); 
            if($model->save()){
                    //$image_id->saveAs($path);
                    UnifiedArchive::archiveNodes(Yii::$app->basePath . '/uploads/prepods/multi', Yii::$app->basePath . '/uploads/prepods/multi/Archive.zip');     
                    return $this->redirect(['view', 'id'=>$model->id]);
                } else {
                throw new NotFoundHttpException('Booooooo');
                }      
        } 
        return $this->render('create', [
                'model' => $model,
            ]);

        
    }

    /**
     * Updates an existing Prepod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Prepod model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['admin']);
    }

    /**
     * Finds the Prepod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prepod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prepod::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
