<?php

namespace app\controllers;
use yii;
use app\models\RepSearch;


class RepController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
	 public function actionRep(){
        $rep= Yii::$app->session['REP'];
        $data = Yii::$app->request->post();
            $rep1 = isset($data['rep1']) ? $data['rep1'] : '';
            $rep2 = isset($data['rep2']) ? $data['rep2'] : '';
            $rep3 = isset($data['rep3']) ? $data['rep3'] : '';
            $rep4 = isset($data['rep4']) ? $data['rep4'] : '';
            $rep5 = isset($data['rep5']) ? $data['rep5'] : '';
            $rep6 = isset($data['rep6']) ? $data['rep6'] : '';
            $rep7 = isset($data['rep7']) ? $data['rep7'] : '';
            $rep8 = isset($data['rep8']) ? $data['rep8'] : '';
            $rep9 = isset($data['rep9']) ? $data['rep9'] : '';
            //$date2 = isset($data['date2']) ? $data['date2'] : '';
        
        $sql = "SELECT r.REP, r.HN, r.PID, r.DATEADM ,CONCAT(SUBSTR(r.TITLES,2),'',r.FNAME,' ',r.LNAME) AS FULLNAME, r.MAININSCL,
        REPLACE(r.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM,s.SUB_FUND,s.TOTL_AMT
        FROM m_registerdata r
        INNER JOIN m_sum_subfund s ON r.tran_id = s.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'

        WHERE (r.REP = '$rep1' OR r.REP = '$rep2' OR r.REP = '$rep3' OR r.REP = '$rep3'OR r.REP = '$rep4'
        OR r.REP = '$rep5'OR r.REP = '$rep6' OR r.REP = '$rep7' OR r.REP = '$rep8' OR r.REP = '$rep9') ";
        $rawData = \yii::$app->db->createCommand($sql)->queryAll();
       try {
           $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
       } catch (\yii\db2\Exception $e) {
           throw new \yii\web\ConflictHttpException('sql error');
       }
       Yii::$app->session['rep1']=$rep1;
       Yii::$app->session['rep2']=$rep2;
       Yii::$app->session['rep3']=$rep3;
       Yii::$app->session['rep4']=$rep4;
       Yii::$app->session['rep5']=$rep5;
       Yii::$app->session['rep6']=$rep6;
       Yii::$app->session['rep7']=$rep7;
       Yii::$app->session['rep8']=$rep8;
       Yii::$app->session['rep9']=$rep9;
       $dataProvider = new \yii\data\ArrayDataProvider([
           'allModels' => $rawData,
           'pagination' => [
            'pageSize' => 200,
            ],
       ]);
       return $this->render('rep', [
                   'searchModel' => $searchModel,
                   'dataProvider' => $dataProvider,
                   'sql'=>$sql,
                   'rep1'=>$rep1,
                   'rep2'=>$rep2,
                   'rep3'=>$rep3,   
                   'rep4'=>$rep4,   
                   'rep5'=>$rep5,   
                   'rep6'=>$rep6,   
                   'rep7'=>$rep7,   
                   'rep8'=>$rep8,                  
                   'rep9'=>$rep9,   
       ]);   
   }
   public function actionRep2(){
    $rep1= Yii::$app->session['rep1'];
    $rep2= Yii::$app->session['rep2'];
    $rep3= Yii::$app->session['rep3'];
    $rep4= Yii::$app->session['rep4'];
    $rep5= Yii::$app->session['rep5'];
    $rep6= Yii::$app->session['rep6'];
    $rep7= Yii::$app->session['rep7'];
    $rep8= Yii::$app->session['rep8'];
    $rep9= Yii::$app->session['rep9'];
    $sql = "SELECT r.REP, r.HN, r.PID, r.DATEADM ,CONCAT(SUBSTR(r.TITLES,2),'',r.FNAME,' ',r.LNAME) AS FULLNAME, r.MAININSCL,
    REPLACE(r.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM,s.SUB_FUND,s.TOTL_AMT
    FROM m_registerdata r
    INNER JOIN m_sum_subfund s ON r.tran_id = s.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'

    WHERE (r.REP = '$rep1' OR r.REP = '$rep2' OR r.REP = '$rep3' OR r.REP = '$rep3'OR r.REP = '$rep4'
    OR r.REP = '$rep5'OR r.REP = '$rep6' OR r.REP = '$rep7' OR r.REP = '$rep8' OR r.REP = '$rep9') ";
    $rawData = \yii::$app->db->createCommand($sql)->queryAll();
   try {
       $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
   } catch (\yii\db2\Exception $e) {
       throw new \yii\web\ConflictHttpException('sql error');
   }
   $dataProvider = new \yii\data\ArrayDataProvider([
       'allModels' => $rawData,
       'pagination' => [
        'pageSize' => 200,
        ],
   ]);
   return $this->render('rep2', [
               'searchModel' => $searchModel,
               'dataProvider' => $dataProvider,
               'sql'=>$sql,
                          
   ]);   
}


}
