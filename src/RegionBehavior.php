<?php
namespace chenkby\region;
use yii\base\Behavior;
use yii\base\InvalidConfigException;

class RegionBehavior extends Behavior
{
    /**
     * @var string 省份字段名
     */
    public $provinceAttribute='province_id';

    /**
     * @var string 城市字段名
     */
    public $cityAttribute='city_id';

    /**
     * @var string 县字段名
     */
    public $districtAttribute='district_id';

    /**
     * @var null|\yii\db\ActiveRecord Region Model
     */
    public $modelClass=null;

    public function init()
    {
        if(!$this->modelClass)throw new InvalidConfigException('modelClass不能为空！');
    }

    public function getProvince()
    {
        $modelClass=$this->modelClass;
        return $this->owner->hasOne($modelClass::className(),['id'=>$this->provinceAttribute]);
    }

    public function getCity()
    {
        $modelClass=$this->modelClass;
        return $this->owner->hasOne($modelClass::className(),['id'=>$this->cityAttribute]);
    }

    public function getDistrict()
    {
        $modelClass=$this->modelClass;
        return $this->owner->hasOne($modelClass::className(),['id'=>$this->districtAttribute]);
    }


    public function getFullRegion($separator = "/")
    {
        return $this->owner->province['name'].$separator.$this->owner->city['name'].$separator. $this->owner->district['name'];
    }
}
