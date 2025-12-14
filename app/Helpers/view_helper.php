<?php

function render_page(string $view, array $data = [])
{
    return view('partials/header', $data)
    .view($view)
    .view('partials/footer', $data);
}
