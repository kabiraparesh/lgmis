<!--<ul class="select"><li><a href="#nogo"><b>Dashboard</b>[if IE 7]><!</a><![endif]
[if lte IE 6]><table><tr><td><![endif]
        <div class="select_sub">
            <ul class="sub">
                <li><a href="#nogo">Dashboard Details 1</a></li>
                <li><a href="#nogo">Dashboard Details 2</a></li>
                <li><a href="#nogo">Dashboard Details 3</a></li>
            </ul>
        </div>
        [if lte IE 6]></td></tr></table></a><![endif]
    </li>
</ul>-->



<?php

Yii::import('zii.widgets.CMenu');

class IDAdminSkinMenu extends CMenu
{

	/**
	 * Renders the menu items.
	 * @param array $items menu items. Each menu item will be an array with at least two elements: 'label' and 'active'.
	 * It may have three other optional elements: 'items', 'linkOptions' and 'itemOptions'.
	 */
	protected function renderMenu($items)
	{
		if(count($items))
		{
                        $this->htmlOptions['class'] = 'select';
//			echo CHtml::openTag('ul',$this->htmlOptions)."\n";
			$this->renderMenuRecursive($items);
//			echo CHtml::closeTag('ul');
		}
	}

	/**
	 * Recursively renders the menu items.
	 * @param array $items the menu items to be rendered recursively
	 */
	protected function renderMenuRecursive($items, $submenu=0)
	{
		$count=0;
		$n=count($items);
		foreach($items as $item)
		{
			$count++;
			$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
			$class=array();
			if($item['active'] && $this->activeCssClass!='')
				$class[]=$this->activeCssClass;
			if($count===1 && $this->firstItemCssClass!==null)
				$class[]=$this->firstItemCssClass;
			if($count===$n && $this->lastItemCssClass!==null)
				$class[]=$this->lastItemCssClass;
			if($this->itemCssClass!==null)
				$class[]=$this->itemCssClass;
			if($class!==array())
			{
				if(empty($options['class']))
					$options['class']=implode(' ',$class);
				else
					$options['class'].=' '.implode(' ',$class);
			}
                        
                        if($submenu == 0){
                            $route=$this->getController()->getRoute();                            
                            if($item['active']){
                                echo CHtml::openTag('ul',array('class'=>'current'))."\n";
                            }
                            else{
                                echo CHtml::openTag('ul',$this->htmlOptions)."\n";  
                            }
                        }
                        
                        if($item['active']){
                            echo CHtml::openTag('li', array('class'=>'sub_show'));
                        }
                        else{
                            echo CHtml::openTag('li', $options);                            
                        }

			$menu=$this->renderMenuItem($item, $submenu);
			if(isset($this->itemTemplate) || isset($item['template']))
			{
				$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
				echo strtr($template,array('{menu}'=>$menu));
			}
			else
				echo $menu;

			if(isset($item['items']) && count($item['items']))
			{
                            if($item['active']){
                                echo CHtml::openTag('div', array('class'=>'select_sub show'));
//				echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
				echo "\n".CHtml::openTag('ul', array('class'=>'sub'))."\n";
				$this->renderMenuRecursive($item['items'], 1);
				echo CHtml::closeTag('ul')."\n";
                                echo CHtml::closeTag('div')."\n";
                            }
                            else{
                                echo CHtml::openTag('div', array('class'=>'select_sub'));
//				echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
				echo "\n".CHtml::openTag('ul', array('class'=>'sub'))."\n";
				$this->renderMenuRecursive($item['items'], 1);
				echo CHtml::closeTag('ul')."\n";
                                echo CHtml::closeTag('div')."\n";
                            }
			}

			echo CHtml::closeTag('li')."\n";
                        if($submenu == 0){
			echo CHtml::closeTag('ul');
                        echo '<div class="nav-divider">&nbsp;</div>';
                        }
		}
	}

	/**
	 * Renders the content of a menu item.
	 * Note that the container and the sub-menus are not rendered here.
	 * @param array $item the menu item to be rendered. Please see {@link items} on what data might be in the item.
	 * @return string
	 * @since 1.1.6
	 */
	protected function renderMenuItem($item, $submenu=0)
	{
		if(isset($item['url']))
		{
			$label=$this->linkLabelWrapper===null ? $item['label'] : '<'.$this->linkLabelWrapper.'>'.$item['label'].'</'.$this->linkLabelWrapper.'>';
                        if($submenu==0){
                            return CHtml::link("<b>$label</b>",$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
                        }
                        else{
                            return CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());                            
                        }
		}
		else
			return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
	}
}