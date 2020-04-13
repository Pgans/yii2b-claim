<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;


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

                <label for="pwd">RepClaim1 : &nbsp;&nbsp; </label>
                <input type="text"  name="rep1"  placeholder="">
            
                <input type="text"  name="rep2"  placeholder="">
            
                <input type="text"  name="rep3"  placeholder="">           
                
                &nbsp;&nbsp;<button class='btn btn-danger'>ค้นหา</button>
                <?= Html::endForm(); ?>


            </div>
        </div>
    </div>
</div>
630100016' OR r.REP = '630100021'
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
                        'attribute' => 'REP',
                       // 'header' => 'rep',
                    ],
                    [
                        'attribute' => 'HN',
                       // 'header' => 'เดือน',
                    ],
                    [
                        'attribute' => 'PID',
                       // 'header' => 'เดือน',
                    ],
                    [
                        'attribute' => 'DATEADM',
                       // 'header' => 'เดือน',
                    ],
                    [
                        'attribute' => 'FULLNAME',
                       // 'header' => 'เดือน',
                    ],
                    [
                        'attribute' => 'MAININSCL',
                       // 'header' => 'เดือน',
                    ],
                    [
                       // 'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'SUMS_SERVICEITEM',
                        'pageSummary' => true,
                    ],
                    // [
                    //     'attribute' => 'จำนวนเด็กคลอด',
                    //     'format' => 'raw',
                    //     'value' =>function($model) {
                    //         $mm = $model['MM'];
                    //         $amount = $model['AMOUNT'];
                    //         return Html::a(Html::encode($amount), ['lr/outcome_list','MM' => $mm],['target'=>'_blank']);
                    //     }
                    //         ],
                       ]
                  ]);
                    ?>
                    
                    <div class="alert alert-danger"><?=$sql?> </div>
