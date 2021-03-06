<?php

namespace App\Controllers\Common;

use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');
        App::$db->insertRow('users', ['name' => 'Testas', 'surname' => 'Tester', 'email' => 'test@test.lt', 'password' => 'test', 'address' => 'LT', 'phone' => '1111']);

        App::$db->createTable('offers');
        App::$db->insertRow('offers', ['offer' => 'Privatus treneris', 'img' => 'trainer', 'offer_info' => 'Privatus treneris Jūsų individualiai mankštai']);
        App::$db->insertRow('offers', ['offer' => 'Sauna', 'img' => 'sauna', 'offer_info' => 'Sauna, atsigauti po mankštos']);
        App::$db->insertRow('offers', ['offer' => 'Masažas', 'img' => 'masaze', 'offer_info' => 'Masažas Jūsų pavargusiems raumenims']);

        App::$db->createTable('feedback');

        print 'Duomenys isvalyti';
    }
}

