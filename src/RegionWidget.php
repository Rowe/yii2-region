<?php

namespace rowe\region;

use yii\base\Widget;
use yii\helpers\Html;


class RegionWidget extends Widget
{
    public $model;
    public $widgetId = "regionSelectorId";
    public $widgetClass = "regionSelectorClass";

    public $provinceAttribute = "province_cd";
    public $cityAttribute = "city_cd";
    public $districtAttribute = "district_cd";
    public $name = "fullRegion";
    public $value;

    public function init()
    {
        if (!$this->model) {
            throw new InvalidParamException('the model can not be null!');
        }

        $this->value = $this->model->{$this->name};
        RegionWidgetAsset::register($this->getView());
    }

    public function run()
    {
        $output[] = Html::activeInput('text', $this->model, $this->name, ['id' => $this->widgetId, 'class' => 'area_input form-control']);
        $output[] = Html::activeHiddenInput($this->model, $this->provinceAttribute);
        $output[] = Html::activeHiddenInput($this->model, $this->cityAttribute);
        $output[] = Html::activeHiddenInput($this->model, $this->districtAttribute);

        $this->getView()->registerJs("jQuery('#" . $this->widgetId . "').areaSelector({
            provinceName:'{$this->provinceAttribute}',
            cityName:'{$this->cityAttribute}',
            districtName:'{$this->districtAttribute}'
        });");

        return @implode("\n", $output);
    }
}
