<?php

namespace app\modules\files\controllers;

use Yii;
use app\modules\files\models\Files;
use app\modules\files\models\FilesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \wapmorgan\UnifiedArchive\UnifiedArchive;
use yii\web\UploadedFile;
use app\modules\files\models\FileType;
use app\helpers\TransliterateHelper;
/**
 * FilesController implements the CRUD actions for Files model.
 */
class FilesController extends Controller
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
     * Lists all Files models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Files model.
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
     * Creates a new Files model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Files();
        if ($model->load(Yii::$app->request->post())) {
            // var_dump(Yii::$app->request->post());
            // Получаем массив данных по загружамых файлах
            $title_arkhive = UploadedFile::getInstances($model, 'title_arkhive');
            // Папка с названием типа фалов (Курсовая, диплом и т.д.)
            $type_directory = FileType::findOne($model->type)->title_en;
            //Папка, в которой сохраняются файлы
            $directory = Yii::$app->getSecurity()->generateRandomString();
            //Путь к папке, в корторой сохраняются файлы, Создаем эту папку
            $directory_path = Yii::$app->basePath . '/uploads/files/'. $type_directory . '/' . $directory;
            mkdir($directory_path);
            //Название архива который создается равно названию папки, в которой сохраняются загружаемые файлы
            $model->title_arkhive = $directory .'.zip';
            //Путь к архиву
            $model->path = Yii::$app->basePath . '/uploads/files/'. $type_directory . '/arkhivs/' . $model->title_arkhive; 
            
            foreach ($title_arkhive as $key => $value) {
                //Получаем первую часть - имя файла
                // TODO  А если в имени есть точки??
                $filename = reset((explode(".", $value->name)));
                //Получаем расширение
                $ext = end((explode(".", $value->name)));
                // Транслитерируем
                $filename = TransliterateHelper::cyrillicToLatin($filename) . ".{$ext}";
                $path = $directory_path . '/' . $filename;
                $value->saveAs($path);
                // В поле контент хранится перечень файлов что есть в архиве
                $model->content .= $filename.'<br />';
            }
            $model->url = $model->path;
            $model->size = '1';
            $model->created_at =  time();
            //$model->updated_at =  0;
            if($model->save()){
                    //Создаем архив из папки $directory_path в файл $model->path
                UnifiedArchive::archiveNodes($directory_path , $model->path);  
                    //Для вычисления и заполнения поля $model->size снова исполяем $model->save
                $model->size = filesize($model->path);  
                if($model->save()){
                    return $this->redirect(['view', 'id'=>$model->id]);
                }else {
                    throw new NotFoundHttpException('Booooooo');
                } 

            } else {
                throw new NotFoundHttpException('Опа! Есть проблеммы((');
            }      
        } 
        return $this->render('create', [
            'model' => $model,
            ]);

        
    }

    /**
     * Updates an existing Files model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_path = $model->path;
        $old_title_arkhive = $model->title_arkhive;
        
        if ($model->load(Yii::$app->request->post())) {
                    // Получаем массив данных по загружамых файлах
            $title_arkhive = UploadedFile::getInstances($model, 'title_arkhive');
                    //var_dump($title_arkhive);
                    // Папка с названием типа фалов (Курсовая, диплом и т.д.)
            
                $type_directory = FileType::findOne($model->type)->title_en;
                    //Папка, в которой сохраняются файлы
                $directory = Yii::$app->getSecurity()->generateRandomString();
                    //Путь к папке, в корторой сохраняются файлы, Создаем эту папку
                $directory_path = Yii::$app->basePath . '/uploads/files/'. $type_directory . '/' . $directory;
                mkdir($directory_path);
                    //Название архива который создается равно названию папки, в которой сохраняются загружаемые файлы
                $model->title_arkhive = $directory .'.zip';
                    //Путь к архиву
                $model->path = Yii::$app->basePath . '/uploads/files/'. $type_directory . '/arkhivs/' . $model->title_arkhive; 
                $model->content = '';
                foreach ($title_arkhive as $key => $value) {
                        //Получаем первую часть - имя файла
                        // TODO  А если в имени есть точки??
                    $filename = reset((explode(".", $value->name)));
                        //Получаем расширение
                    $ext = end((explode(".", $value->name)));
                        // Транслитерируем
                    $filename = TransliterateHelper::cyrillicToLatin($filename) . ".{$ext}";
                    $path = $directory_path . '/' . $filename;
                    $value->saveAs($path);
                        // В поле контент хранится перечень файлов что есть в архиве
                    $model->content .= $filename.'<br />';
                }
                $model->url = $model->path;
                    //$model->size = '1';
                $model->updated_at =  time();

                if($model->save()){
                            //Создаем архив из папки $directory_path в файл $model->path
                    UnifiedArchive::archiveNodes($directory_path , $model->path);  
                            //Для вычисления и заполнения поля $model->size снова исполяем $model->save
                    $model->size = filesize($model->path);  
                    if($model->save()){
                            $del_dir = $old_path;
                            if ($objs = glob($del_dir."/*")) {
                               foreach($objs as $obj) {
                                 is_dir($obj) ? removeDirectory($obj) : unlink($obj);
                               }
                            }
                            rmdir($dir);
                          
                        return $this->redirect(['view', 'id'=>$model->id]);

                    }else {
                        throw new NotFoundHttpException('Booooooo');
                    } 

                } else {
                    throw new NotFoundHttpException('Опа! Есть проблеммы((');
                }
            }      
        

        return $this->render('create', [
            'model' => $model,
            ]);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing Files model.
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
     * Finds the Files model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Files::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
