<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Http\Livewire\ApiTokenManager;
use Laravel\Jetstream\Jetstream;

class Apimanager extends ApiTokenManager
{
    public $domains = [];

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
        'domains' => [],
    ];

    /**
     * Create a new API token.
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
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
            $this->createApiTokenForm['sandboxtoken'],
            $this->createApiTokenForm['domains']
        ));

        $this->createApiTokenForm['name'] = '';
        $this->createApiTokenForm['permissions'] = Jetstream::$defaultPermissions;
        $this->createApiTokenForm['sandboxtoken'] = '';
        $this->createApiTokenForm['domains'] = '';

        $this->emit('created');
    }

    public function removeInput($i){
        unset($this->domains[$i]);
    }
}
