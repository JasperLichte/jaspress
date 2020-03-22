<?php

namespace render\components\pages\admin;

use request\Statistics;
use request\Url;

class StatisticsPage extends AdminPage
{

    public static function endPoint(): Url
    {
        return Url::to('/admin/statistics.php');
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/statistics',
            ['statistics' => new Statistics($this->db)]
        );
    }

    public function title(): string
    {
        return $this->buildTitle('Statistics');
    }

}
