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

                <label for="pwd">รหัสRep : &nbsp;&nbsp; </label>
                <input type="text"  name="rep1"  placeholder="">
            
                <input type="text"  name="rep2"  placeholder="">
            
                <input type="text"  name="rep3"  placeholder="">           
                
                &nbsp;&nbsp;<button class='btn btn-danger'>ค้นหา</button>
                <?= Html::endForm(); ?>


            </div>
        </div>
    </div>
</div>
630100016 OR r.REP = 630100021
<?php

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before'=>'<a>รายงานข้อมูลE-Claim แยกตามREP</a>',
            'after'=>'ประมวลผล '.date('Y-m-d H:i:s')
            ],
            'showPageSummary' => true,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'REP',
                        'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                    ],
                    [
                        'attribute' => 'HN',
                       'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                       
                    ],
                    
                    [
                        'attribute' => 'DATEADM',
                    'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                    ],
                    [
                        'attribute' => 'FULLNAME',
                        'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                        

                    ],
                    [
                        'attribute' => 'MAININSCL',
                       'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                       'pageSummary'=> 'รวม',
                    ],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'SUMS_SERVICEITEM',
                        'headerOptions'=>[ 'style'=>'background-color:#8d8de3'] ,
                        'pageSummary' => true,
                    ],
        //             [
        //       'class' => 'yii\grid\ActionColumn',
        //       'header'=>'Actions',
        //       'options'=>['style'=>'width:150px;'],
        //       'buttonOptions'=>['class'=>'btn btn-default'],
        //       'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{print} {view} {update} {delete} </div>',
        //       'buttons'=>[
        //         'print'=>function($url,$model){
        //           return Html::a('<i class="glyphicon glyphicon-print"></i>',['pdf/url'],['class'=>'btn-pdfprint btn btn-default','data-pjax'=>'0']);
        //         }
        //       ]
        //     ],
         ],
                  ]);
                    ?>
                    
                    <div class="alert alert-danger"><?=$sql?> </div>
