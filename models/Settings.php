<?php namespace Kloos\Chatwoot\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'kloos_chatwoot_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}