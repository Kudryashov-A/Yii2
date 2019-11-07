<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $product = new Product();
        $product->id = 1;
        $product->name = '<p>Corolla</p>';
//        $product->category = 'car';
        $product->price = 500;
        $product->created_at = time();

        $testResult = Yii::$app->test->getProp();
        $product->validate();
//        _end($product->getAttributes());
//        return VarDumper::dumpAsString($product->getErrors(), 5, true);
//        Yii::info('success', 'pay');
        $id = 1;
        _log(Yii::$app->db->createCommand('SELECT [[name]] FROM {{product}} WHERE id=:id', [':id' => $id])->queryAll());
        $query = new Query();
//        _end($query->from('product')->select(['ID' => 'id', 'Модель' => 'name'])->where(['>', 'id', $id])->orderBy('name')->all());
        return $this->render(   'index',
            ['var' => 'data', 'product' => $product, 'testResult' => $testResult]
        );
    }
    public function actionInsert()
    {
        Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'First user',
                'name' => 'Vasya',
                'password_hash' => 'dfljeeruao',
                'created_at' => time(),
            ])->execute();
        Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'Second user',
                'name' => 'Petya',
                'password_hash' => 'ewqerqruao',
                'created_at' => time(),
            ])->execute();
        Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'Third user',
                'name' => 'Ivan',
                'password_hash' => 'dfdfahhhao',
                'created_at' => time(),
            ])->execute();
        function userId($userName) {
            return Yii::$app->db->createCommand('SELECT [[id]] FROM {{user}} WHERE [[username]]=:username')->bindParam(':username', $userName)->queryScalar();
        }
        Yii::$app->db->createCommand()->batchInsert('task',
            ['title', 'description', 'creator_id', 'created_at'], [
                ['Title 1', 'This is task 1', userId('First user'), time()],
                ['Title 2', 'This is task 2', userId('Third user'), time()],
                ['Title 3', 'This is task 3', userId('Second user'), time()],
            ]

        )->execute();
        echo 'Записи успешно добавлены в базу данных';
    }
    public function actionSelect()
    {
        $id = 1;
        $query1 = new Query();
        echo 'а)' . VarDumper::dumpAsString($query1->from('user')->where(['id' => $id])->all(), 5, true) . '<br>';
        $query2 = new Query();
        echo 'б)' . VarDumper::dumpAsString($query2->from('user')->where(['>', 'id', $id])->orderBy(['name' => SORT_ASC])->all(), 5, true) . '<br>';
        $query3 = new Query();
        echo 'в)' . VarDumper::dumpAsString($query3->from('user')->count(), 5, true) . '<br>';
        $query4 = new Query();
        echo 'Доп.' . VarDumper::dumpAsString($query4->from('task')->innerJoin('user', 'task.creator_id = user.id')->all(), 5, true);

        exit();
    }
}
