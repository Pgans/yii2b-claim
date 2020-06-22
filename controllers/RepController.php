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
    public function actionIpcs() {
        $sql = "
        SELECT DISTINCT m.DATEADM, m.PID, m.HN, CONCAT(SUBSTR(m.TITLES,2),'',m.FNAME,' ',m.LNAME) AS FULLNAME , m.MAININSCL,
        s.SUB_FUND, m.REP, REPLACE(m.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM, s.TOTL_AMT, m.DRG_NHSO,
        m.ADJRW_NHSO, m.DRG_NHSO
        FROM m_registerdata m
        INNER JOIN m_sum_subfund s ON s.tran_id = m.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'
        WHERE m.DATEADM BETWEEN '25630101' AND '25630131'
        ";
        $rawData = \yii::$app->db1->createCommand($sql)->queryAll();
   try {
       $rawData = \Yii::$app->db1->createCommand($sql)->queryAll();
   } catch (\yii\db1\Exception $e) {
       throw new \yii\web\ConflictHttpException('sql error');
   }
   $dataProvider = new \yii\data\ArrayDataProvider([
       'allModels' => $rawData,
       'pagination' => [
        'pageSize' => 200,
        ],
   ]);
        return $this->render('ipcs', [
            'searchModel'=> $searchModel,
            'dataProvider'=> $dataProvider,
            'sql'=> $sql,

        ]);
    }
    public function actionAdjrw(){
        $sql = "      
SELECT k.HCODE, k.NAME,k.MAININSCL,k.SUB_FUND, COUNT(k.sub_fund) AS AMOUNT ,SUM(k.ADJRW_NHSO) AS ADJRW
FROM (
SELECT DISTINCT m.HCODE,m.DATEADM, m.PID, m.HN, CONCAT(SUBSTR(m.TITLES,2),'',m.FNAME,' ',m.LNAME) AS FULLNAME , m.MAININSCL,
s.SUB_FUND, m.REP, REPLACE(m.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM, s.TOTL_AMT,
m.ADJRW_NHSO, m.DRG_NHSO, i.NAME
FROM m_registerdata m
INNER JOIN m_sum_subfund s ON s.tran_id = m.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'
INNER JOIN inscl_nhso i ON i.CODE = m.MAININSCL
WHERE m.DATEADM BETWEEN '25621001' AND '25630930' )as k
GROUP BY k.SUB_FUND
                ";
                $rawData = \yii::$app->db1->createCommand($sql)->queryAll();
                try {
                    $rawData = \Yii::$app->db1->createCommand($sql)->queryAll();
                } catch (\yii\db1\Exception $e) {
                    throw new \yii\web\ConflictHttpException('sql error');
                }
                $dataProvider = new \yii\data\ArrayDataProvider([
                    'allModels' => $rawData,
                    'pagination' => [
                     'pageSize' => 200,
                     ],
                ]);
                     return $this->render('adjrw_nhso', [
                         'searchModel'=> $searchModel,
                         'dataProvider'=> $dataProvider,
                         'sql'=> $sql,
             
                     ]);
                 }
                 public function actionTrimas(){
                    $sql1 = "      
            SELECT k.HCODE, k.NAME,k.MAININSCL,k.SUB_FUND, COUNT(k.sub_fund) AS AMOUNT ,SUM(k.ADJRW_NHSO) AS ADJRW
            FROM (
            SELECT DISTINCT m.HCODE,m.DATEADM, m.PID, m.HN, CONCAT(SUBSTR(m.TITLES,2),'',m.FNAME,' ',m.LNAME) AS FULLNAME , m.MAININSCL,
            s.SUB_FUND, m.REP, REPLACE(m.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM, s.TOTL_AMT,
            m.ADJRW_NHSO, m.DRG_NHSO, i.NAME
            FROM m_registerdata m
            INNER JOIN m_sum_subfund s ON s.tran_id = m.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'
            INNER JOIN inscl_nhso i ON i.CODE = m.MAININSCL
            WHERE m.DATEADM BETWEEN '25621001' AND '25630131' )as k
            GROUP BY k.SUB_FUND
                            ";
                            $rawData1 = \yii::$app->db1->createCommand($sql1)->queryAll();
                            try {
                                $rawData1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
                            } catch (\yii\db1\Exception $e) {
                                throw new \yii\web\ConflictHttpException('sql error');
                            }
                            $dataProvider1 = new \yii\data\ArrayDataProvider([
                                'allModels' => $rawData1,
                                'pagination' => [
                                 'pageSize' => 200,
                                 ],
                            ]);                
   
        $sql2 = "      
SELECT k.HCODE, k.NAME,k.MAININSCL,k.SUB_FUND, COUNT(k.sub_fund) AS AMOUNT ,SUM(k.ADJRW_NHSO) AS ADJRW
FROM (
SELECT DISTINCT m.HCODE,m.DATEADM, m.PID, m.HN, CONCAT(SUBSTR(m.TITLES,2),'',m.FNAME,' ',m.LNAME) AS FULLNAME , m.MAININSCL,
s.SUB_FUND, m.REP, REPLACE(m.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM, s.TOTL_AMT,
m.ADJRW_NHSO, m.DRG_NHSO, i.NAME
FROM m_registerdata m
INNER JOIN m_sum_subfund s ON s.tran_id = m.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'
INNER JOIN inscl_nhso i ON i.CODE = m.MAININSCL
WHERE m.DATEADM BETWEEN '25630201' AND '25630631' )as k
GROUP BY k.SUB_FUND
                ";
                $rawData2 = \yii::$app->db1->createCommand($sql2)->queryAll();
                try {
                    $rawData2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
                } catch (\yii\db1\Exception $e) {
                    throw new \yii\web\ConflictHttpException('sql error');
                }
                $dataProvider2 = new \yii\data\ArrayDataProvider([
                    'allModels' => $rawData2,
                    'pagination' => [
                     'pageSize' => 200,
                     ],
                ]);
                    
                    $sql3 = "      
            SELECT k.HCODE, k.NAME,k.MAININSCL,k.SUB_FUND, COUNT(k.sub_fund) AS AMOUNT ,SUM(k.ADJRW_NHSO) AS ADJRW
            FROM (
            SELECT DISTINCT m.HCODE,m.DATEADM, m.PID, m.HN, CONCAT(SUBSTR(m.TITLES,2),'',m.FNAME,' ',m.LNAME) AS FULLNAME , m.MAININSCL,
            s.SUB_FUND, m.REP, REPLACE(m.SUMS_SERVICEITEM,',','') as SUMS_SERVICEITEM, s.TOTL_AMT,
            m.ADJRW_NHSO, m.DRG_NHSO, i.NAME
            FROM m_registerdata m
            INNER JOIN m_sum_subfund s ON s.tran_id = m.tran_id AND s.ITEM_SOURCE = 'M_REGISTER'
            INNER JOIN inscl_nhso i ON i.CODE = m.MAININSCL
            WHERE m.DATEADM BETWEEN '25630601' AND '25630930' )as k
            GROUP BY k.SUB_FUND
                            ";
                            $rawData3 = \yii::$app->db1->createCommand($sql3)->queryAll();
                            try {
                                $rawData3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
                            } catch (\yii\db1\Exception $e) {
                                throw new \yii\web\ConflictHttpException('sql error');
                            }
                            $dataProvider3 = new \yii\data\ArrayDataProvider([
                                'allModels' => $rawData3,
                                'pagination' => [
                                 'pageSize' => 200,
                                 ],
                            ]);
                                 return $this->render('trimas', [
                                     'searchModel'=> $searchModel,
                                     'dataProvider1'=> $dataProvider1,
                                     'dataProvider2'=> $dataProvider2,
                                     'dataProvider3'=> $dataProvider3,
                                     'sql1'=> $sql1,
                         
                                 ]);
                             }
}
