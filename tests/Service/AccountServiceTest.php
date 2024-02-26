<?php
namespace Devina\KerupukJulak\Service;
// require_once __DIR__ . "/../../vendor/autoload.php";
use Devina\KerupukJulak\Config\Database;
use Devina\KerupukJulak\Domain\Account;
use Devina\KerupukJulak\Exception\ValidationException;
use Devina\KerupukJulak\Model\Account\AccountRegisterRequest;
use Devina\KerupukJulak\Repository\AccountRepository;
use PHPUnit\Framework\TestCase;

class AccountServiceTest extends TestCase
{
    private AccountService $accountService;
    private AccountRepository $accountRepository;

    protected function setUp() : void
    {
        $this->accountRepository = new AccountRepository(Database::getConnect());
        $this->accountService = new AccountService($this->accountRepository);

        $this->accountRepository->deleteAll();
    }

    public function testRegisterAdminSucces()
    {
        $request = new AccountRegisterRequest();
        $request->username = "nudriin";
        $request->name = "Devina";
        $request->email = "nudriin@gmail.com";
        $request->phone = "01249193834";
        $request->password = "12345";

        $response = $this->accountService->register($request);

        self::assertEquals($request->username, $response->account->username);
        self::assertEquals($request->name, $response->account->name);
        self::assertEquals($request->email, $response->account->email);
        self::assertTrue(password_verify($request->password, $response->account->password));
    }

    public function testRegisterAdminFailed()
    {
        $this->expectException(ValidationException::class);

        $request = new AccountRegisterRequest();
        $request->username = "";
        $request->name = "";
        $request->email = "";
        $request->phone = "";
        $request->password = "";

        $this->accountService->register($request);

    }

    public function testRegisterAdminDuplicate()
    {
        $this->expectException(ValidationException::class);

        $account = new Account();
        $account->id = "12";
        $account->username = "nudriin";
        $account->name = "Devina Hishasy";
        $account->email = "nudriin@gmail.com";
        $account->phone = "01249193834";
        $account->password = "12345";
        $account->role = "Admin";
        $account->profile_pic = "test.png";

        $this->accountRepository->save($account);

        $request = new AccountRegisterRequest();
        $request->username = "nudriin";
        $request->name = "Devina";
        $request->email = "nudriin@gmail.com";
        $request->phone = "01249193834";
        $request->password = "12345";

        $this->accountService->register($request);

    }
}