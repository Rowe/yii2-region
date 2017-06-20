<?php
namespace rowe\region;

use yii\base\Widget;


class RegionSelector extends Widget
{


    public function registerAssets(){
        $view = $this->getView();
        RegionSelectorAsset::register($view);
        $view->registerJs("jQuery('#btn1').areaSelector();");
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

        return "<input type=\"text\" name=\"\" id=\"btn1\" class=\"area_input\">";
    }

}
