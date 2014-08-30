<?php 

namespace app\components\imageHandler;

use Yii;
use yii\base\Component;
use yii\web\UploadedFile;
use yii\imagine\Image;
use app\helpers\TransliterateHelper;
/**
 * Class File
 * @package common\components\storage
 * todo: Extend form UploadedFile??
 */
class ImageHandler extends Component
{
	public function createImage($model, $module,  $attribute = 'image_id' )
		{
		// Получаем массив данных по загружамых файлах
            $image_id = UploadedFile::getInstance($model, $attribute);
            $filename = $image_id->name;
            $ext = end((explode(".", $image_id->name)));
            // Генерируем уникальное имя файла
            if($module == 'prepods'){
                $title_en =  TransliterateHelper::cyrillicToLatin($model->surname);
            }else {
                $title_en =  TransliterateHelper::cyrillicToLatin($model->title);
            }
            $model->image_id = $module . '-'. 
            					substr($title_en, 0, 6) . '-' . 
            					\Yii::$app->getSecurity()->generateRandomString(5). '.'.$ext;
            					
            $image_name = $model->image_id;
            // Путь к папке где будет хранится файл
            $path = \Yii::$app->basePath . '/uploads/'.$module.'/' . $model->image_id;
            
            if($model->save()){
                
                // Сохраняем рисунок
                $image_id->saveAs($path);

                $image_full = \Yii::$app->image->load($path);
                $full_path = \Yii::$app->basePath . '/uploads/'.$module.'/' . $image_name;
                $image_full->resize(600, 400);
                $image_full->save($full_path);
                // Обработка загруженного изображения и создание thumbs
                $image_less = \Yii::$app->image->load($path);
                $less_path = \Yii::$app->basePath . '/uploads/'.$module.'/' .'thumbs/thumb_' . $image_name;
                $image_less->resize(50, 50);
                $image_less->save($less_path);
				return true;
        }
    }

    public function updateImage($model, $module,  $old_image, $attribute = 'image_id' )
        {
        // Получаем массив данных по загружамых файлах
            $image_id = UploadedFile::getInstance($model, $attribute);
            // Если в форме ввели новый рисунок
            if(!empty($image_id)) {
                $filename = $image_id->name;
                $ext = end((explode(".", $image_id->name)));
                if($module == 'prepods'){
                    $title_en =  TransliterateHelper::cyrillicToLatin($model->surname);
                }else {
                    $title_en =  TransliterateHelper::cyrillicToLatin($model->title);
                }
                // generate a unique file name
                $model->image_id = $module . '-'. 
                                substr($title_en, 0, 6) . '-' . 
                                \Yii::$app->getSecurity()->generateRandomString(5). '.'.$ext;
                $path = \Yii::$app->basePath . '/uploads/'.$module.'/' . $model->image_id;
            }
            else $model->image_id = $old_image; 
            $image_name = $model->image_id;
            
            if($model->save()){
                if(!empty($image_id)) {
                    // Сохраняем новый рисунок и удаляем старый
                    $image_id->saveAs($path);
                    // Обработка загруженного изображения и создание thumbs
                    $image_full = Yii::$app->image->load($path);
                    $full_path = \Yii::$app->basePath . '/uploads/' . $module.'/' . $image_name;
                    $image_full->resize(600, 400);
                    $image_full->save($full_path);
                    // Обработка загруженного изображения и создание thumbs
                    $image_less = \Yii::$app->image->load($path);
                    $less_path = \Yii::$app->basePath . '/uploads/' . $module.'/thumbs/thumb_' . $image_name;
                    $image_less->resize(50, 50);
                    $image_less->save($less_path);

                    $old_path = Yii::$app->basePath . '/uploads/' . $module . '/' . $old_image;
                    $old_thumb_path = Yii::$app->basePath . '/uploads/' . $module . '/thumbs/thumb_' . $old_image;
                    if(!empty($old_image) && file_exists($old_path)) {
                        unlink($old_path);
                    }
                    if(!empty($old_image) && file_exists($old_thumb_path)) {
                        unlink($old_thumb_path);
                    }
                    return true;
                }

       
                
        }
    }
}
