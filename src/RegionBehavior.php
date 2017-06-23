<?php

namespace rowe\region;

use yii\base\Behavior;
use yii\base\InvalidConfigException;

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
        return $this->owner->hasOne($modelClass::className(), ['code' => $this->provinceAttribute, 'level' => 1]);
    }

    public function getCity()
    {
        $modelClass = $this->modelClass;
        return $this->owner->hasOne($modelClass::className(), ['code' => $this->cityAttribute, 'level' => 2]);
    }

    public function getDistrict()
    {
        $modelClass = $this->modelClass;
        return $this->owner->hasOne($modelClass::className(), ['code' => $this->districtAttribute, 'level' => 3]);
    }


    public function getFullRegion($separator = "/")
    {
        return $this->owner->province['name'] . $separator . $this->owner->city['name'] . $separator . $this->owner->district['name'];
    }
}
