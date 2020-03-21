<?php

namespace settings\strategies;

use database\Connection;

interface SavingStrategy
{

    public function save(Connection $db);

    public function delete(Connection $db);

}
