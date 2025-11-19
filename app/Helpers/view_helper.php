<?php

function render_page(string $view, array $data = [])
{
    echo view('partials/header', $data);
    echo view($view);
    echo view('partials/footer', $data);
}
