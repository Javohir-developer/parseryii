<?php

namespace frontend\controllers;

use Yii;
use GuzzleHttp\Client; // подключаем Guzzle
use common\models\Yandex;
use frontend\models\YandexSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YandexController implements the CRUD actions for Yandex model.
 */
class YandexController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Yandex models.
     * @return mixed
     */
    public function actionIndex()
    {


//        // создаем экземпляр класса
//        $client = new Client();
//        // отправляем запрос к странице Яндекса
//        $res = $client->request('GET', 'http://www.yandex.ru');
//        // получаем данные между открывающим и закрывающим тегами body
//        $body = $res->getBody();
//        // вывод страницы Яндекса в представление
//        return $this->render('index', ['news' => $body]);

//___________________________________________________________________________

//        // создаем экземпляр класса
//        $client = new Client();
//        // отправляем запрос к странице Яндекса
//        $res = $client->request('GET', 'http://www.yandex.ru');
//        // получаем данные между открывающим и закрывающим тегами body
//        $body = $res->getBody();
//        // подключаем phpQuery
//        $document = \phpQuery::newDocumentHTML($body);
//        //Смотрим html страницы Яндекса, определяем внешний класс списка и считываем его командой find
//        $news = $document->find(".news__item-content ");
//        // вывод списка новостей Яндекса с главной страницы в представление
//        return $this->render('index', ['news' => $news]);

//_____________________________________________________________________________

        // создаем экземпляр класса
        $client = new Client();
        // отправляем запрос к странице Яндекса
        $res = $client->request('GET', 'https://www.kolesa.ru/news');
        // получаем данные между открывающим и закрывающим тегами body
        $body = $res->getBody();
        // подключаем phpQuery
        $document = \phpQuery::newDocumentHTML($body);
        // получаем список новостей
        $news = $document->find(".col-md-4.col-sm-6");
        // выполняем проход циклом по списку
        foreach ($news as $elem) {
            //pq аналог $ в jQuery
            $pq = pq($elem);
//            // удалим первую новость в списке
//            $pq->find('li.b-news-list__item:first')->remove();
            // выполним поиск в скиске ссылок
            $tags = $pq->find('.post-list-item')->next()->attr('href');
            // добавим ковычки в начало и в конец предложения
//            $tags->append('" ')->prepend(' "'); //
//            // добавим свой класс к последней новости списка
//            $pq->find('li.b-news-list__item:last')->addClass('my_last_class');
        }
        // вывод списка новостей яндекса с главной страницы в представление
        return $this->render('index', ['news' => $news]);


    }

    /**
     * Displays a single Yandex model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Yandex model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Yandex();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Yandex model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Yandex model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Yandex model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Yandex the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Yandex::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
