<?php

use Kloos\Chatwoot\Models\Settings;

Route::get('/js/chatwindow.js', function () {
    $script = file_get_contents(plugins_path('kloos/chatwoot/assets/js/chatwindow.js'));
    $parser = new \October\Rain\Parse\Twig();

    $user = BackendAuth::getUser();

    $params = [
        'launcherTitle' => Settings::get('launcherTitle'),
        'websiteToken' => Settings::get('websiteToken'),
        'baseUrl' => Settings::get('baseUrl'),
        'type' => Settings::get('type'),    // expanded_bubble or standard
        'locale' => Settings::get('locale'),
        'position' => Settings::get('position'),
        'showPopoutButton' => Settings::get('launcherTitle') ? 'true' : 'false',

        'setUser' => Settings::get('setUser'),
        'userId' => $user->id,
        'userEmail' => $user->email,
        'userName' => $user->name,
    ];

    return response($parser->parse($script, $params))
        ->header('Content-Type', 'application/javascript; charset=utf-8');
})->middleware('web');