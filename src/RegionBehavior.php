<?php

namespace rowe\region;

use yii\base\Behavior;
use rowe\region\RegionModel;


class RegionBehavior extends Behavior
{

    /**
     * @var string 省份字段名
     */
    public $provinceAttribute = 'province_cd';

    /**
     * @var string 城市字段名
     */
    public $cityAttribute = 'city_cd';

    /**
     * @var string 县字段名
     */
    public $districtAttribute = 'district_cd';


    public function init()
    {
        parent::init();
    }


    public function getProvince()
    {
        return RegionModel::findOne(['code' => $this->owner->{$this->provinceAttribute}, 'level' => RegionModel::PROVINCE_LEVEL]);
    }

    public function getCity()
    {
        return RegionModel::findOne(['code' => $this->owner->{$this->cityAttribute}, 'level' => RegionModel::CITY_LEVEL, 'parent_id' => $this->owner->province['id']]);
    }

    public function getDistrict()
    {
        return RegionModel::findOne(['code' => $this->owner->{$this->districtAttribute}, 'level' => RegionModel::DISTRICT_LEVEL, 'parent_id' => $this->owner->city['id']]);
    }

    public function getFullRegion($separator = "/")
    {
        $provinceName = $this->owner->province['name'];
        $cityName = empty($this->owner->city['name']) ? "" : $separator . $this->owner->city['name'];
        $districtName = empty($this->owner->district['name']) ? "" : $separator . $this->owner->district['name'];

        return $provinceName . $cityName . $districtName;
    }
}
