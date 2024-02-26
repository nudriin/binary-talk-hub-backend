<?php
namespace Nurdin\BinaryTalk\Model\Account;

class AccountRegisterRequest
{
    public ?string $username = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $name = null;
}