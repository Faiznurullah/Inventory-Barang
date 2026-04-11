<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Core\Session;
use App\Core\View;

abstract class BaseController
{
    protected function view(string $name, array $data = []): void
    {
        $data['flash_success'] = Session::flash('success');
        $data['flash_error'] = Session::flash('error');
        $data['flash_warning'] = Session::flash('warning');

        View::render($name, $data);
    }

    protected function redirect(string $route): void
    {
        header('Location: index.php?r=' . $route);
        exit;
    }
}
