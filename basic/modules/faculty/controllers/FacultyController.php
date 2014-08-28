<?php

namespace app\modules\faculty\controllers;

use Yii;
use app\modules\faculty\models\Faculty;
use app\modules\faculty\models\FacultySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * FacultyController implements the CRUD actions for Faculty model.
 */
class FacultyController extends Controller
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
     * Lists all Faculty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FacultySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionAdmin()
    {
        $searchModel = new FacultySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Faculty model.
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
     * Creates a new Faculty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Faculty();

        if ($model->load(Yii::$app->request->post())) {
            // Получаем массив данных по загружамых файлах
            $image_id = UploadedFile::getInstance($model, 'image_id');
            $filename = $image_id->name;
            $ext = end((explode(".", $image_id->name)));
            // Генерируем уникальное имя файла
            $model->image_id = Yii::$app->getSecurity()->generateRandomString(). '.' .$ext;
            // Путь к папке где будет хранится файл
            $path = Yii::$app->basePath . '/uploads/faculty/' . $model->image_id;
            
            if($model->save()){
                    // Сохраняем рисунок
                $image_id->saveAs($path);
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                throw new NotFoundHttpException('Не удалось загрузить данные');
            }      
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Faculty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $old_image = $model->image_id; 
        if ($model->load(Yii::$app->request->post())) {
            // Получаем массив данных по загружамых файлах
            $image_id = UploadedFile::getInstance($model, 'image_id');
            // Если в форме ввели новый рисунок
            if(!empty($image_id)) {
                $filename = $image_id->name;
                $ext = end((explode(".", $image_id->name)));
                // generate a unique file name
                $model->image_id = Yii::$app->getSecurity()->generateRandomString(). '.' .$ext;
                $path = Yii::$app->basePath . '/uploads/faculty/' . $model->image_id;
            }
            else $model->image_id = $old_image; 
            if($model->save()){
                if(!empty($image_id)) {
                        // Сохраняем новый рисунок и удаляем старый
                    $image_id->saveAs($path);
                    $old_path = Yii::$app->basePath . '/uploads/faculty/' . $old_image;
                    if(!empty($old_image)) {
                    	unlink($old_path);
                    }
                }
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                throw new NotFoundHttpException('Booooooo');
            }      
        } 
        return $this->render('update', [
            'model' => $model,
            ]);
    }

    /**
     * Deletes an existing Faculty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Faculty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faculty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faculty::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
