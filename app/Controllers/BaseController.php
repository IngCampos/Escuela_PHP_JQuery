<?php

namespace App\Controllers;

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

class BaseController
{
    protected $templateEngine;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../views');

        $this->templateEngine = new \Twig\Environment($loader, [
            'debug' => true,
            'cache' => false
        ]);
    }

    public function renderHTML($fileName, $data = [])
    {
        return new Htmlresponse($this->templateEngine->render($fileName, $data));
    }

    public function redirectTypeUser($userType)
    {
        switch ($userType) {
            case 1: // Administrator
                return new RedirectResponse('/admin/users');
                break;
            case 2: // Teacher
                return new RedirectResponse('/rolecall');
                break;
            case 3: // Student
                return new RedirectResponse('/student');
                break;
            default: // unknown error
                return new RedirectResponse('/logout');
                break;
        }
    }
}
