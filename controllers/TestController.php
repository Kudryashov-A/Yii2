<?php

namespace app\controllers;

use Yii;
use app\models\Product;
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
        $product->name = 'Corolla';
        $product->category = 'car';
        $product->price = 1000000;

        $testResult = Yii::$app->test->getProp();

        return $this->render(   'index',
            ['var' => 'data', 'product' => $product, 'testResult' => $testResult]
        );
    }
}
