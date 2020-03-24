<?php

namespace render\components\pages\admin\calendar;

use calendar\Item;
use render\components\pages\admin\AdminPage;
use request\Url;

class EditItemPage extends AdminPage
{

    /** @var Item */
    private $item;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet('i')) {
            $this->item = Item::load($this->db, $this->req->getGet('i'));
        }
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/calendar/edit.php');
    }

    protected function render(): string
    {
        parent::render();

        if ($this->item == null) {
            $this->req->redirectTo(CalendarPage::endPoint());
        }

        return $this->renderController->render(
            '@pages/admin/calendar/edit',
            [
                'item' => $this->item,
                'dateValue' => $this->item->getDueDate()->format('Y-m-d\TH:i:s'),
            ]
        );
    }

    public function title(): string
    {
        return $this->buildTitle('Edit');
    }

}
