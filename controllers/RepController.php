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
        //$rep= Yii::$app->session['REP'];
        $data = Yii::$app->request->post();
            $rep1 = isset($data['rep1']) ? $data['rep1'] : '';
            $rep2 = isset($data['rep2']) ? $data['rep2'] : '';
            $rep3 = isset($data['rep3']) ? $data['rep3'] : '';
            //$date2 = isset($data['date2']) ? $data['date2'] : '';
        
        $sql = "SELECT r.REP, r.HN, r.PID, r.DATEADM ,CONCAT(r.TITLES,'',r.FNAME,'   ',r.LNAME) AS FULLNAME, r.MAININSCL,
        REPLACE(r.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM
        FROM m_registerdata r
        WHERE (r.REP = '$rep1' OR r.REP = '$rep2' OR r.REP = '$rep3') ";
        $rawData = \yii::$app->db->createCommand($sql)->queryAll();
       try {
           $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
       } catch (\yii\db2\Exception $e) {
           throw new \yii\web\ConflictHttpException('sql error');
       }
       $dataProvider = new \yii\data\ArrayDataProvider([
           'allModels' => $rawData,
           'pagination' => [
            'pageSize' => 3  0,
            ],
       ]);
       return $this->render('rep', [
                   'searchModel' => $searchModel,
                   'dataProvider' => $dataProvider,
                   'sql'=>$sql,
                   'rep1'=>$rep1,

                   
       ]);   
   }

}
