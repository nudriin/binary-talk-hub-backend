<?php
namespace Nurdin\BinaryTalk\Model\Account;

class AccountPasswordRequest
{
    public ?string $username = null;
    public ?string $oldPassword = null;
    public ?string $newPassword = null;

}