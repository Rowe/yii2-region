# yii2-region
Yii2 extension for Chinese region list box(https://github.com/rowe/yii2-region-selector)

## Installation

add to composer.json file with:

```
"rowe/yii2-region": "dev-master"
```

## Configuration
Copy the @rowe/yii2-region/src/migrations/m170621_032947_region.php to the migration folder like console/migrations.
Run 
```angular2html
"Yii migrate"
```
The region codes would be inserted via Yii migration

## Usage
Firstly, bind the behavior to your model which need to use the region fields.
```php
public function behaviors()
{
    return [
        'RegionBehavior' => [
            'class' => RegionBehavior::className(),
        ]
    ];
}
```

And then, use the widget in the view.
```php
<?= RegionWidget::widget(['model' => $model]);?>
```

## demo


