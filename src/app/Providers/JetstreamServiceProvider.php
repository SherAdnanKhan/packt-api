<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
        $this->app->singleton(
            \Laravel\Fortify\Contracts\RegisterResponse::class,
            \App\Http\Responses\RegisterResponse::class
        );

    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['TEST', 'PI']);

        Jetstream::role('admin', __('Administrator'), [
            'TEST',
            'PI',
            'CONTENT',
            'ALLCONTENT',
            'STORE',
            'SUBS',
            'SU'
        ])->description(__('Administrator users can perform any action.'));

        Jetstream::role('editor', __('Editor'), [
            'TEST',
            'PI',
            'CONTENT',
            'ALLCONTENT',
            'STORE',
            'SUBS',
        ])->description(__('Standard users have access to TEST and PI actions'));
    }
}
