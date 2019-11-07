<?php

namespace app\controllers;

use Yii;
use app\models\Product;
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
        $product->name = '<p>Corolla</p> ';
//        $product->category = 'car';
        $product->price = 500;
        $product->created_at = time();

        $testResult = Yii::$app->test->getProp();
        $product->validate();
        return VarDumper::dumpAsString($product->validate(), 5, true);

        return $this->render(   'index',
            ['var' => 'data', 'product' => $product, 'testResult' => $testResult]
        );
    }
}
