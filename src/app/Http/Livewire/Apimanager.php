<?php

namespace App\Http\Livewire;

use Laravel\Jetstream\Http\Livewire\ApiTokenManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;
use App\Models\User;

class Apimanager extends ApiTokenManager
{
   /* public function render()
    {
        return view('livewire.apimanager');
    }*/

    /**
     * The create API token form state.
     *
     * @var array
     */
    public $createApiTokenForm = [
        'name' => '',
        'permissions' => [],
        'sandboxtoken' => '',
    ];

    /**
     * Create a new API token.
     *
     * @return void
     */
    public function createApiToken()
    {
        $this->resetErrorBag();

        Validator::make([
            'name' => $this->createApiTokenForm['name'],
        ], [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createApiToken');

        $this->displayTokenValue($this->user->createToken(
            $this->createApiTokenForm['name'],
            Jetstream::validPermissions($this->createApiTokenForm['permissions']),
            $this->createApiTokenForm['sandboxtoken']
        ));

        $this->createApiTokenForm['name'] = '';
        $this->createApiTokenForm['permissions'] = Jetstream::$defaultPermissions;
        $this->createApiTokenForm['sandboxtoken'] = '';

        $this->emit('created');
    }
}
