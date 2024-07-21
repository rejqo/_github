<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
		<!--user menu-->
	<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
<!--Tag cloud--> 
 <?php $this->widget('TagCloud', array(
	 'maxTags'=>Yii::app()->params['tagCloudCount'],
 )); ?>
 <!--recent cooments>
 <?php $this->widget('RecentComments', array(
        'maxComments'=>Yii::app()->params['recentCommentCount'],
    )); ?>
	
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>