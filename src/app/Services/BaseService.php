<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Http\Request;

abstract class BaseService {

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var User
     */
    protected $user;

    public function setRequest(Request $request) : self
    {
        $this->request = $request;
        return $this;
    }

    public function setUser(User $user) : self
    {
        $this->user = $user;
        return $this;
    }

}
