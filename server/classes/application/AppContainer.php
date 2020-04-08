<?php


namespace application;


use database\Connection;
use permissions\Permission;
use request\License;
use request\Request;
use request\Url;

class AppContainer
{

    /** @var Request */
    protected $req;

    /** @var Connection */
    private $rootDb;

    /** @var Connection */
    protected $db;

    /** @var App */
    protected $app;


    public function __construct()
    {
        $this->app = App::getInstance();
        $this->req = $this->app->getRequest();

        if (!$this->app->isSuccesfulInit()) {
            $this->handleInvalidLicense();
        } else {
            $this->rootDb = $this->app->getRootDb();
            $this->db = $this->app->getClientDb();
        }
    }

    private function handleInvalidLicense()
    {
        $this->req->redirectTo(Url::api('/error/invalid_license.php'));
    }

    protected function checkPermission(Permission $permission): bool
    {
        return (
            License::_isValid($this->app->getState()->getLicense())
            && $permission->check($this->req->getUser())
        );
    }

}
