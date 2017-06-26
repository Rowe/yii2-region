<?php

namespace rowe\region;

use yii\base\Behavior;
use yii\base\InvalidConfigException;

class RegionBehavior extends Behavior
{

    const PROVINCE_LEVEL = 1;
    const CITY_LEVEL = 2;
    const DISTRICT_LEVEL = 3;
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

    /**
     * @var null|\yii\db\ActiveRecord Region Model
     */
    public $modelClass = null;

    public function init()
    {
        if (!$this->modelClass) throw new InvalidConfigException('modelClass不能为空！');
    }

    public function getProvince()
    {
        $modelClass = $this->modelClass;
        return $modelClass::findOne(['code' => $this->owner->{$this->provinceAttribute}, 'level' => static::PROVINCE_LEVEL]);
    }

    public function getCity()
    {
        $modelClass = $this->modelClass;
        return $modelClass::findOne(['code' => $this->owner->{$this->cityAttribute}, 'level' => static::CITY_LEVEL]);
    }

    public function getDistrict()
    {
        $modelClass = $this->modelClass;
        return $modelClass::findOne(['code' => $this->owner->{$this->districtAttribute}, 'level' => static::DISTRICT_LEVEL]);
    }


    public function getFullRegion($separator = "/")
    {
        $provinceName = $this->owner->province['name'];
        $cityName = empty($this->owner->city['name'])?"":$separator.$this->owner->city['name'];
        $districtName = empty($this->owner->district['name'])?"":$separator.$this->owner->district['name'];

        return $provinceName.$cityName.$districtName;
    }
}
