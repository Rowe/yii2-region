<?php

namespace rowe\region;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $code
 * @property int $level
 */
class RegionModel extends \yii\db\ActiveRecord
{

    const PROVINCE_LEVEL = 1;
    const CITY_LEVEL = 2;
    const DISTRICT_LEVEL = 3;
        /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

}
