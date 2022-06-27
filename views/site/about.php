<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
$this -> registerCssFile('@web/css/about.css');
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    Компания «Copy Star» занимается обслуживанием физических и юридических лиц и дает возможность приобретать любой товар в любом количестве из всего огромного ассортимента, представленного на сайте компании. Индивидуальный подход к каждому клиенту и выделение персонального менеджера по продажам позволяет подобрать наиболее эффективное решение и обеспечить достойный сервис, отвечающий всем пожеланиям.
    </p>
    <h1>Девиз компании</h1>
    <p>Пока принтер печатает — вы отдыхаете!</p>
    <h1>Новинки компании</h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="1500" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
      <?php foreach ($rows as $key => $row): ?>
        <?php $active = !$key ? "active" : "" ?>
    <div class="carousel-item <?=$active ?>">
    <h5> <?= $row['title'] ?> </h5>
      <?= Html::img("@web/img/{$row['img']}", ['alt' => 'Новинка 1', 'class' => 'img-class'] ) ?>
      <div class="carousel-caption d-none d-md-block">

      </div>
    </div>
    <? endforeach ?>
    
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Предыдущий</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Следующий</span>
  </a>
</div>
</div>