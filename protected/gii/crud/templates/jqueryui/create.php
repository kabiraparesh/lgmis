<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('application', '$label')=>array('index'),
	Yii::t('application', 'Create'),
);\n";
?>

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php "?> echo Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))); <?php echo "?>"?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
