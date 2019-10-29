<?php
    /* @var $this yii\web\View */
    /* @var $var string */
    /* @var $product \app\models\Product */
    /* @var $testResult string */

?>
<h1>Наш продукт:</h1>
<?php
//echo $var;
//echo '<br>';
//echo $product->name;
echo \yii\widgets\DetailView::widget(['model' => $product]);
echo $testResult;