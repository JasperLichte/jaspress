<?php

namespace render\components\pages\admin\calendar;

use calendar\Calendar;
use render\components\pages\admin\AdminPage;
use request\Url;

class CalendarPage extends AdminPage
{

    /** @var Calendar */
    private $calendar;

    public function __construct()
    {
        parent::__construct();

        $this->calendar = new Calendar($this->db);
        $this->calendar->load();
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/calendar');
    }

    public function title(): string
    {
        return $this->buildTitle('Calendar');
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/calendar/calendar',
            ['calendar' => $this->calendar]
        );
    }

}
