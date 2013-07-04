<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('application','$label')=>array('index'),
	Yii::t('application', \$model->{$nameColumn}),
);\n";
?>

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', '" . $this->modelClass . "'))) . ' #' . \$model->{$this->tableSchema->primaryKey};?>"; ?></h1>

<?php echo "<?php\n"; ?> 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
