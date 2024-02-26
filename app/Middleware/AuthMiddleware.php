<?php
namespace Nurdin\BinaryTalk\Middleware;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Nurdin\BinaryTalk\Config\Database;
use Nurdin\BinaryTalk\Exception\ValidationException;
use Nurdin\BinaryTalk\Middleware\Middleware;
use Nurdin\BinaryTalk\Model\Account\AccountGetRequest;
use Nurdin\BinaryTalk\Repository\AccountRepository;
use Nurdin\BinaryTalk\Service\AccountService;
use stdClass;

class AuthMiddleware implements Middleware
{
    private AccountService $accountService;
    public function __construct()
    {
        $connection = Database::getConnect();
        $accountRepository = new AccountRepository($connection);
        $this->accountService = new AccountService($accountRepository);
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../"); // ! BISA BEGINI
        $dotenv->load();
    }

    public function auth() : void
    {
        try {
            $headers = getallheaders();
            if (!isset($headers['Authorization'])) throw new ValidationException("Unauthorized");

            list(, $token) = explode(' ', $headers['Authorization']);
            $payload = JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));

            $request = new AccountGetRequest();
            $request->username = $payload->username;

            $account = $this->accountService->getUser($request);

            $user = [
                'username' => $account->account->username,
                'email' => $account->account->email,
                'name' => $account->account->name,       
                'profile_pic' => $account->account->profile_pic      
            ];

            http_response_code(200);
            $json = json_encode($user);
            header("user: $json");

        } catch (ValidationException $e) {
            http_response_code(400);
            echo json_encode([
                'errors' => $e->getMessage()
            ]);
            http_response_code(400);
            exit();
        }
    }
}