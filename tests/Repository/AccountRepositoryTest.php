<?php
namespace Nurdin\BinaryTalk\Repository;
// require_once __DIR__ . "/../../vendor/autoload.php";
use Nurdin\BinaryTalk\Config\Database;
use Nurdin\BinaryTalk\Domain\Account;
use Nurdin\BinaryTalk\Repository\AccountRepository;
use PHPUnit\Framework\TestCase;

class AccountRepositoryTest extends TestCase
{
    private AccountRepository $accountRepository;

    protected function setUp() : void
    {
        $this->accountRepository = new AccountRepository(Database::getConnect());
        $this->accountRepository->deleteAll();
    }

    public function testRegisterSucces()
    {
        $account = new Account();
        $account->id = "12";
        $account->username = "nudriin";
        $account->name = "Devina Hishasy";
        $account->email = "nudriin@gmail.com";
        $account->password = "12345";
        $account->role = "Admin";
        $account->profile_pic = "test.png";

        $this->accountRepository->save($account);

        $result = $this->accountRepository->findById($account->id);

        self::assertEquals($account->id, $result->id);
        self::assertEquals($account->username, $result->username);
        self::assertEquals($account->name, $result->name);
        self::assertEquals($account->email, $result->email);
        self::assertEquals($account->password, $result->password);
        self::assertEquals($account->role, $result->role);
    }

    public function testNotFound(){
        $account = "";
        $result = $this->accountRepository->findById($account);

        self::assertNull($result);
    }
}