<?php
require_once SITE_ROOT . 'app/view/render.php';

function offres()
{
    $data = [
        'head_title' => 'Nos offres - ExpressSite'
    ];
    render('offres.php', $data);
}
