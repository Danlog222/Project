<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $year
 * @property int $price
 * @property string $model
 * @property string $country
 * @property string $img
 * @property int $count
 * @property string $date
 * @property int $id_category
 *
 * @property Category $category
 * @property OrderConsist[] $orderConsists
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'year', 'price', 'model', 'country', 'img', 'count', 'id_category'], 'required'],
            [['year', 'price', 'count', 'id_category'], 'integer'],
            [['date'], 'safe'],
            [['title', 'model', 'country', 'img'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'year' => 'Год',
            'price' => 'Цена',
            'model' => 'Модель',
            'country' => 'Страна',
            'img' => 'Img',
            'count' => 'Количество',
            'date' => 'Date',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[OrderConsists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderConsists()
    {
        return $this->hasMany(OrderConsist::className(), ['id_product' => 'id']);
    }

    public static function getImages()
    {
        return (new \yii\db\Query())
        -> select(['title','img'])
        -> from ('product')
        -> orderBy('date DESC')
        ->limit(5)
        -> all()
        ;
    }
}
