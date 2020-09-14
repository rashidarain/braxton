<?php

use app\modules\reports\components\ColorSerialColumn;
use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\widgets\Pjax;

Pjax::begin(['id' => $reportType . '-report-gridview', 'clientOptions' => []]);
echo GridView::widget([
    'dataProvider' => $provider,
    'summary' => "Showing {begin} - {end} of $provider->totalCount items",
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
    'columns' => [
        [
            'header' => '',
            'class' => ColorSerialColumn::class
        ],
        [
            'attribute' => 'priority',
            'value' => function ($model) use ($provider) {
                return $model->getPriority();
            },
        ],
        'number',
        [
            'attribute' => 'distribution',
            'value' => function ($model) use ($provider) {
                $totalViewings = $provider->pagination->params['totalNumber'];
                if ($totalViewings)
                    return round((float)($model->number / $totalViewings) * 100) . '%';
                else
                    return '';
            },
        ],
    ],
]);
?>
    <div class="distribution-block">
    <?php if ($provider->pagination->params['page'] < 2) : ?>
        <h4><?= Yii::t('app', 'Distribution of Leads') ?></h4>
        <a class="show-chart show-pie-chart-report btn btn-default"
           href="#"><?php echo FA::icon('pie-chart')->border(); ?></a>
        <a class="show-chart show-bar-chart-report btn btn-default"
           href="#"><?php echo FA::icon('bar-chart') ?></a>

        <div class="distribution-pie distribution-tab" style="height: 400px">
            <?php
            echo $this->render($viewsPath . 'charts/tasks_by_priority__pie', ['provider' => $provider]);
            ?>
        </div>
        <div class="distribution-bar distribution-tab" style="display: none; height: 400px">
            <?php
            echo $this->render($viewsPath . 'charts/tasks_by_priority__bar', ['provider' => $provider]);
            ?>
        </div>
    <?php endif; ?>
    </div>
<?php Pjax::end();