<?php
Yii::import('zii.widgets.CPortlet');
 
 class RecentComments extends CPortlet
 {
     public $title='Recent Comments';
     public $maxComments=10;
  
     public function getRecentComments()
     {
         return Comment::model()->findRecentComments($this->maxComments);
     }
  
     protected function renderContent()
     {
         $this->render('recentComments');
     }
     public function findRecentComments($limit=10)
    {
        return $this->with('post')->findAll(array(
            'condition'=>'t.co_status='.self::STATUS_APPROVED,
            'order'=>'t.crated_at DESC',
            'limit'=>$limit,
        ));
    }
 }
 ?>