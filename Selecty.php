<?php
/**
 * @Author: eliz
 * @Date:   2015-01-28 10:52:59
 * @Last Modified by:   eliz
 * @Last Modified time: 2015-02-03 16:19:44
 */

namespace eliz\selecty;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;
use yii\base\InvalidConfigException;

class Selecty extends InputWidget
{
	public $template = '{input}{addon}';


	public $options = [];
	public $data = null;
	public $relation = null;
	private $_hidden = false;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		SelectyAsset::register($this->view);
    }

	/**
	 * @inheritdoc
	 */
	public function run()
	{
        $relations = $this->model->{$this->attribute};
		if ($this->data === null || $this->relation === null )
            throw new InvalidConfigException("'data' is required.");
        if ($relations)
			$values = ArrayHelper::map($relations, $this->relation,$this->relation);
		else
			$values = [];
		$input = '<div class="selecty" id="'.$this->options["id"].'">'
				.'<div class="selecty-search"><input class="form-control selecty-search-input" placeholder="'
				. \Yii::t("app","Search")
				.'" type="text"><input type="checkbox" class="selecty-search-checkbox"></div>'
				.'<div class="selecty-wrapper">';
	    foreach ($this->data as $key => $value) {
		    $selected = in_array($key, $values) ? "checked" : "";
		    $input .= "<label><input name='{$this->attribute}[]' value='$key' $selected type='checkbox'><span>$value</span></label>";
	    }
    	$input .= '</div></div>';
    	$this->registerClientScript();
		return $input;
	}

	/**
	 * @inheritdoc
	 */
	public function registerClientScript()
	{
		$view = $this->getView();

		$script = "Selecty('#".$this->options["id"]."');";

		$view->registerJs($script,\yii\web\View::POS_READY);
	}
} 
