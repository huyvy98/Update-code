<?php

namespace Modules\User\Repositories;

class Auth
{
    /** @var string */
    public string $token;

    /**
     * AuthModel constructor.
     *
     * @param string $token
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token
        ];
    }
}
