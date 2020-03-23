<?php

namespace api\actions\admin\calendar;

use api\actions\admin\AdminAction;
use api\ApiResponse;
use calendar\Item;
use render\components\pages\admin\calendar\CalendarPage;

class DeleteCalenderEntryAction extends AdminAction
{

    /** @var int */
    private $id = 0;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet('i')) {
            $this->id = (int)$this->req->getGet('i');
        }
    }

    public function run(): ApiResponse
    {
        if (empty($this->id)) {
            return $this->req->reloadWith(
                $this->res->setErrorMessage('No id passed!')
            );
        }

        Item::delete($this->db, $this->id);

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('Entry deleted'),
            CalendarPage::endPoint()
        );
    }

}
