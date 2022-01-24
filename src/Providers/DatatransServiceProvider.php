<?php

namespace GoodPayments\Datatrans\Providers;

use Illuminate\Support\ServiceProvider;
use GoodPayments\Datatrans\Exceptions\InvalidConfiguration;

class DatatransServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/datatrans.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'datatrans');
        $this->publishes([
            __DIR__.'/../../public' => public_path(''), 
            __DIR__.'/../../database/seeders' => $this->app->databasePath().'/seeders',
            __DIR__.'/../config/google-calendar.php' => $this->app->configPath('google-calendar.php'),
            'public']);
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/google-calendar.php', 'google-calendar');

        $this->app->bind(GoogleCalendar::class, function () {
            $config = config('google-calendar');

            $this->guardAgainstInvalidConfiguration($config);

            return GoogleCalendarFactory::createForCalendarId($config['calendar_id']);
        });

        $this->app->alias(GoogleCalendar::class, 'laravel-google-calendar');
    }
    protected function guardAgainstInvalidConfiguration(array $config = null)
    {
        if (empty($config['calendar_id'])) {
            throw InvalidConfiguration::calendarIdNotSpecified();
        }

        $authProfile = $config['default_auth_profile'];

        if ($authProfile === 'service_account') {
            $this->validateServiceAccountConfigSettings($config);

            return;
        }

        if ($authProfile === 'oauth') {
            $this->validateOAuthConfigSettings($config);

            return;
        }

        throw InvalidConfiguration::invalidAuthenticationProfile($authProfile);
    }

    protected function validateServiceAccountConfigSettings(array $config = null)
    {
        $credentials = $config['auth_profiles']['service_account']['credentials_json'];

        $this->validateConfigSetting($credentials);
    }

    protected function validateOAuthConfigSettings(array $config = null)
    {
        $credentials = $config['auth_profiles']['oauth']['credentials_json'];

        $this->validateConfigSetting($credentials);

        $token = $config['auth_profiles']['oauth']['token_json'];

        $this->validateConfigSetting($token);
    }

    protected function validateConfigSetting(string $setting)
    {
        if (! is_array($setting) && ! is_string($setting)) {
            throw InvalidConfiguration::credentialsTypeWrong($setting);
        }

        if (is_string($setting) && ! file_exists($setting)) {
            throw InvalidConfiguration::credentialsJsonDoesNotExist($setting);
        }
    }
}