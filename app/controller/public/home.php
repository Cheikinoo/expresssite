<?php

function home() {
    $data = [
        'head_title' => 'Bienvenue - ExpressSite',
        'intro' => 'Bienvenue sur ExpressSite. On aide les commerces locaux à exister sur Internet 🚀'
    ];

    render('home.php', $data);
}
