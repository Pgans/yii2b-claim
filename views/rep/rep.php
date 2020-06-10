<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\editable\Editable;


$this->title = 'rep E-Claim';
//$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['rep/index']];
//$this->params['breadcrumbs'][] = 'รายงานข้อมูลE-Claim แยกตามREP';
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"><i class="fa fa-search"></i> ค้นหาRep</div>
            <div class="panel-body">

                <?= Html::beginForm(); ?>

                <label for="pwd">RepNo : &nbsp;&nbsp; </label>
                <input type="text"  name="rep1"  placeholder="">
                <input type="text"  name="rep2"  placeholder="">
                <input type="text"  name="rep3"  placeholder="">  
                <input type="text"  name="rep4"  placeholder="">
                <input type="text"  name="rep5"  placeholder="">
                <input type="text"  name="rep6"  placeholder="">
                <input type="text"  name="rep7"  placeholder="">
                <input type="text"  name="rep8"  placeholder="">
                <input type="text"  name="rep9"  placeholder="">         
                
                &nbsp;&nbsp;<button class='btn btn-danger'>ค้นหา</button>
                <?= Html::endForm(); ?>
                
            </div>
        </div>
    </div>
</div>

<?php

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before'=>'<a>รายงานข้อมูลE-Claim แยกตามREP  ประจำเดือน</a> '.date('Y-m'),
            'after'=>'ประมวลผล '.date('Y-m-d H:i:s')
            ],
            'showPageSummary' => true,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        //'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'REP',
                        'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                       // 'label'=>'REP',611100035
                       'format'=>'raw',
                       'value' => function ($model, $key, $index, $widget) {
                        return "<font  color='2E86C1'>" . $model['REP'] . "</font>"; 
                },       
                    ],
                    [
                        'attribute' => 'HN',
                       'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                       
                    ],
                    
                    [
                        'attribute' => 'DATEADM',
                        'label'=>'วันที่รับบริการ',
                    'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                    ],
                    [
                        'attribute' => 'FULLNAME',
                        'label'=>'ชื่อ-สกุล',
                        'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                        'format'=>'raw',
                        'value' => function ($model, $key, $index, $widget) {
                            return "<font  color='2E86C1'>" . $model['FULLNAME'] . "</font>"; 
                    }, 
                    ],
                    [
                        'attribute' => 'SUB_FUND',
                        'label'=>'กองทุนย่อย',
                       'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                       'format'=>'raw',
                        'value' => function ($model, $key, $index, $widget) {
                            return "<font  color='FF9C33'>" . $model['SUB_FUND'] . "</font>"; 
                    }, 
                       'pageSummary'=> 'รวม',
                    ],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'SUMS_SERVICEITEM',
                        'label'=>'เรียกเก็บ',
                        'format'=>'raw',
                       // 'value' => function ($model, $key, $index, $widget) {
                          //  return "<font  color='FF9C33'>" . $model['SUMS_SERVICEITEM'] . "</font>"; 
                   // }, 
                        'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                        'pageSummary' => true,
                    ],//FF9C33  42E908  
                    [
                        'attribute' => 'TOTL_AMT',
                        'label'=>'ชดเชย',
                    'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                    'pageSummary'=> true,
                    ],
                       ]
                  ]);
                    ?>
                    
                    <div class="alert alert-danger"><?=$sql?> </div>
