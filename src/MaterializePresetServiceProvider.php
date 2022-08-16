<?php

namespace Skys215\MaterializePreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class MaterializePresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('materialize', function (UiCommand $command) {
            $adminLTEPreset = new MaterializePreset($command);
            $adminLTEPreset->install();

            $command->info('Materialize scaffolding installed successfully.');

            if ($command->option('auth')) {
                $adminLTEPreset->installAuth();
                $command->info('Materialize CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('materialize-localized', function (UiCommand $command) {
            $adminLTEPreset = new MaterializeLocalizedPreset($command);
            $adminLTEPreset->install();

            $command->info('Materialize scaffolding installed successfully with localization.');

            if ($command->option('auth')) {
                $adminLTEPreset->installAuth();
                $command->info('Materialize CSS auth scaffolding installed successfully with localization.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('materialize-fortify', function (UiCommand $command) {
            $fortifyMaterializePreset = new MaterializePreset($command, true);
            $fortifyMaterializePreset->install();

            $command->info('Materialize scaffolding installed successfully for Laravel Fortify.');

            if ($command->option('auth')) {
                $fortifyMaterializePreset->installAuth();
                $command->info('Materialize CSS auth scaffolding installed successfully for Laravel Fortify.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        if (class_exists(Fortify::class)) {
            Fortify::loginView(function () {
                return view('auth.login');
            });

            Fortify::registerView(function () {
                return view('auth.register');
            });

            Fortify::confirmPasswordView(function () {
                return view('auth.passwords.confirm');
            });

            Fortify::requestPasswordResetLinkView(function () {
                return view('auth.passwords.email');
            });

            Fortify::resetPasswordView(function () {
                return view('auth.passwords.reset');
            });

            Fortify::verifyEmailView(function () {
                return view('auth.verify');
            });
        }
    }
}
