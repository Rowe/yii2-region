<?php

namespace rowe\region;

use yii\base\Widget;
use yii\helpers\Html;


class RegionSelector extends Widget
{
    public $model;
    public $widgetId = "regionSelectorId";
    public $widgetClass = "regionSelectorClass";

    public $provinceAttribute = "province_cd";
    public $cityAttribute = "city_cd";
    public $districtAttribute = "district_cd";
    public $name = "fullRegion";
    public $value;

    public function registerAssets()
    {
        $view = $this->getView();
        RegionSelectorAsset::register($view);
        $view->registerJs("jQuery('#" . $this->widgetId . "').areaSelector({
            provinceName:'{$this->provinceAttribute}',
            cityName:'{$this->cityAttribute}',
            districtName:'{$this->districtAttribute}'
        });");
    }

    public function init()
    {
        $this->registerAssets();

    }

    public function run()
    {
//        $output[] = Html::activeDropDownList($this->model, $this->province['attribute'], $this->province['items'],
//            $this->province['options']);
//        $output[] = Html::activeDropDownList($this->model, $this->city['attribute'], $this->city['items'],
//            $this->city['options']);
//        if (!empty($this->district)) {
//            $output[] = Html::activeDropDownList($this->model, $this->district['attribute'], $this->district['items'],
//                $this->district['options']);
//        }
//        return @implode("\n", $output);

        $output[] = Html::activeInput('text', $this->model, $this->name, ['id' => $this->widgetId, 'class' => 'area_input form-control']);
        $output[] = Html::activeHiddenInput($this->model, $this->provinceAttribute);
        $output[] = Html::activeHiddenInput($this->model, $this->cityAttribute);
        $output[] = Html::activeHiddenInput($this->model, $this->districtAttribute);


        return @implode("\n", $output);
    }

}
