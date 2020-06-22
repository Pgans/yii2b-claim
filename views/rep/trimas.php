<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\editable\Editable;




$this->title = 'ไตรมาส1';
//$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['rep/index']];
//$this->params['breadcrumbs'][] = 'รายงานข้อมูลE-Claim แยกตามREP';
?>
  <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"><i class="glyphicon glyphicon-user"></i>รายงานข้อมูลE-Claim ผู้ป่วยใน ADJRW จากสปสช.</<i></div>
                        <div class="panel-body"> 
                            <div>
<?php
echo GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        'panel' => [
            'before'=>'<a>รายงานข้อมูลE-Claim ผู้ป่วยใน ADJRW จากสปสช.  ประจำเดือน</a> '.date('Y-m'),
            'after'=>'ประมวลผลปีงบประมาณ2563 จาก 1 ตุลาคม 2562  ถึง  1 ธันวาคม 2563',
            ],
            'showPageSummary' => true,
            'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute' => 'HCODE',
                        'label'=>'รหัส รพ.',
                        'headerOptions'=>[ 'style'=>'background-color:#08EC54'] ,
                       'format'=>'raw',
                       'value' => function ($model, $key, $index, $widget) {
                        return "<font  color='2E86C1'>" . $model['HCODE'] . "</font>"; 
                },       
                    ],
                    [
                        'attribute' => 'NAME',
                        'label'=>'สิทธิการพยาบาล',
                       'headerOptions'=>[ 'style'=>'background-color:#08EC54'] ,
                       
                    ],
                    
                    [
                        'attribute' => 'MAININSCL',
                        'label'=>'รหัสสิทธิ์',
                    'headerOptions'=>[ 'style'=>'background-color:#08EC54'] ,
                    ],
                    [
                        'attribute' => 'SUB_FUND',
                        'label'=>'กองทุนย่อย',
                       'headerOptions'=>[ 'style'=>'background-color:#08EC54'] ,
                       'format'=>'raw',
                        'value' => function ($model, $key, $index, $widget) {
                            return "<font  color='FF9C33'>" . $model['SUB_FUND'] . "</font>"; 
                    }, 
                       'pageSummary'=> 'รวม',
                    ],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'AMOUNT',
                        'label'=>'จำนวน(ราย)',
                        'format'=>'raw',
                        'headerOptions'=>[ 'style'=>'background-color:#08EC54'],
                        'pageSummary' => true,
                    ],//FF9C33  42E908  
                     [
                         'attribute' => 'ADJRW',
                         'format'=>'raw',
                         'headerOptions'=>['style'=>'background-color:#08EC54'],
                         'format'=>['decimal', 4],
                         'pageSummary'=> true,
                     ],
                    ]
                    ]);
                      ?>       
    </div>   
    <div>   
<?php
echo GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel,
        'panel' => [
            'before'=>'<a>รายงานข้อมูลE-Claim ผู้ป่วยใน ADJRW จากสปสช.  ประจำเดือน</a> '.date('Y-m'),
            'after'=>'ประมวลผลปีงบประมาณ2563 จาก 1 ตุลาคม 2562  ถึง  1 ธันวาคม 2563',
            ],
            'showPageSummary' => true,
            'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute' => 'HCODE',
                        'label'=>'รหัส รพ.',
                        'headerOptions'=>[ 'style'=>'background-color:#85C1E9'] ,
                       'format'=>'raw',
                       'value' => function ($model, $key, $index, $widget) {
                        return "<font  color='2E86C1'>" . $model['HCODE'] . "</font>"; 
                },       
                    ],
                    [
                        'attribute' => 'NAME',
                        'label'=>'สิทธิการพยาบาล',
                       'headerOptions'=>[ 'style'=>'background-color:#85C1E9'] ,
                       
                    ],
                    
                    [
                        'attribute' => 'MAININSCL',
                        'label'=>'รหัสสิทธิ์',
                    'headerOptions'=>[ 'style'=>'background-color:#85C1E9'] ,
                    ],
                    [
                        'attribute' => 'SUB_FUND',
                        'label'=>'กองทุนย่อย',
                       'headerOptions'=>[ 'style'=>'background-color:#85C1E9'] ,
                       'format'=>'raw',
                        'value' => function ($model, $key, $index, $widget) {
                            return "<font  color='FF9C33'>" . $model['SUB_FUND'] . "</font>"; 
                    }, 
                       'pageSummary'=> 'รวม',
                    ],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'AMOUNT',
                        'label'=>'จำนวน(ราย)',
                        'format'=>'raw',
                        'headerOptions'=>[ 'style'=>'background-color:#85C1E9'],
                        'pageSummary' => true,
                    ],//FF9C33  42E908  
                     [
                         'attribute' => 'ADJRW',
                         'format'=>'raw',
                         'headerOptions'=>['style'=>'background-color:#85C1E9'],
                         'format'=>['decimal', 4],
                         'pageSummary'=> true,
                     ],
                    ]
                    ]);
                      ?>
                    </div> 
                  
   <div>    
<?php
echo GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel,
        'panel' => [
            'before'=>'<a>รายงานข้อมูลE-Claim ผู้ป่วยใน ADJRW จากสปสช.  ประจำเดือน</a> '.date('Y-m'),
            'after'=>'ประมวลผลปีงบประมาณ2563 จาก 1 ตุลาคม 2562  ถึง  1 ธันวาคม 2563',
            ],
            'showPageSummary' => true,
            'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute' => 'HCODE',
                        'label'=>'รหัส รพ.',
                        'headerOptions'=>[ 'style'=>'background-color:#FADBD8'] ,
                       'format'=>'raw',
                       'value' => function ($model, $key, $index, $widget) {
                        return "<font  color='2E86C1'>" . $model['HCODE'] . "</font>"; 
                },       
                    ],
                    [
                        'attribute' => 'NAME',
                        'label'=>'สิทธิการพยาบาล',
                       'headerOptions'=>[ 'style'=>'background-color:#FADBD8'] ,
                       
                    ],
                    
                    [
                        'attribute' => 'MAININSCL',
                        'label'=>'รหัสสิทธิ์',
                    'headerOptions'=>[ 'style'=>'background-color:#FADBD8'] ,
                    ],
                    [
                        'attribute' => 'SUB_FUND',
                        'label'=>'กองทุนย่อย',
                       'headerOptions'=>[ 'style'=>'background-color:#FADBD8'] ,
                       'format'=>'raw',
                        'value' => function ($model, $key, $index, $widget) {
                            return "<font  color='FF9C33'>" . $model['SUB_FUND'] . "</font>"; 
                    }, 
                       'pageSummary'=> 'รวม',
                    ],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'AMOUNT',
                        'label'=>'จำนวน(ราย)',
                        'format'=>'raw',
                        'headerOptions'=>[ 'style'=>'background-color:#FADBD8'],
                        'pageSummary' => true,
                    ],//FF9C33  42E908  
                     [
                         'attribute' => 'ADJRW',
                         'format'=>'raw',
                         'headerOptions'=>['style'=>'background-color:#FADBD8'],
                         'format'=>['decimal', 4],
                         'pageSummary'=> true,
                     ],
                    ]
                    ]);
                      ?>
                    </div> 
             </div>  
     </div>
     <input class="btn btn-primary" name="btnButton" type="button" value="Print Results" onClick="JavaScript:window.print();">
                    
                  
                    
                   