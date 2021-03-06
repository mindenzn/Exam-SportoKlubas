<?php

namespace App\Controllers\Common;

use App\App;
use App\Views\BasePage;
use Core\View;
use Core\Views\Link;

class HomeController
{
    protected $page;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'SportoKlubas',
            'js' => ['/media/js/home.js']
        ]);
    }

    /**
     * Home Controller Index
     *
     * @return string|null
     * @throws \Exception
     */
    public function index(): ?string
    {
        $user = App::$session->getUser();

        if ($user) {

            $heading = '';
            $links = [
                'login' => (new Link([
                    'url' => App::$router::getUrl('logout'),
                    'text' => 'Logout'
                ]))->render()
            ];
        } else {
            $heading = 'Jūs neprisijungęs';
            $links = [
                'login' => (new Link([
                    'url' => App::$router::getUrl('login'),
                    'text' => 'Login'
                ]))->render()
            ];
        }

        $content = (new View([
            'title' => '',
            'heading' => $heading,
            'forms' => $forms ?? [],
            'links' => $links ?? [],
            'offers' => App::$db->getRowsWhere('offers'),
        ]))->render(ROOT . '/app/templates/content/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}

