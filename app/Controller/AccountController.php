<?php

namespace Nurdin\BinaryTalk\Controller;

require_once __DIR__ . "/../Helper/ImageHelper.php";

use Nurdin\BinaryTalk\Config\Database;
use Nurdin\BinaryTalk\Exception\ValidationException;
use Nurdin\BinaryTalk\Model\Account\AccountLoginRequest;
use Nurdin\BinaryTalk\Model\Account\AccountPasswordRequest;
use Nurdin\BinaryTalk\Model\Account\AccountRegisterRequest;
use Nurdin\BinaryTalk\Model\Account\AccountUpdateProfileRequest;
use Nurdin\BinaryTalk\Repository\AccountRepository;
use Nurdin\BinaryTalk\Service\AccountService;
use Dotenv\Dotenv;

class AccountController
{
    private AccountService $accountService;

    public function __construct()
    {
        $connection = Database::getConnect();
        $accountRepository = new AccountRepository($connection);
        $this->accountService = new AccountService($accountRepository);
    }

    public function register()
    {
        try {
            /**
             * php://input': Ini adalah stream wrapper khusus dalam PHP yang memungkinkan akses ke 
             * data input permintaan HTTP raw. Dengan menggunakan 'php://input', Anda dapat 
             * membaca data yang dikirimkan dalam body permintaan HTTP, terlepas dari tipe konten
             * (seperti form data, JSON, XML, dll.).
             */
            $json = file_get_contents('php://input'); //! Ambil JSON yang dikirim oleh user
            // Decode json tersebut agar mudah mengambil nilainya
            $request = json_decode($json);

            if (!isset($request->username) || !isset($request->email) || !isset($request->name) || !isset($request->password)) {
                throw new ValidationException("username, email, nama and password is required");
            }

            $registerRequest = new AccountRegisterRequest();
            $registerRequest->username = $request->username;
            $registerRequest->email = $request->email;
            $registerRequest->name = $request->name;
            $registerRequest->password = $request->password;

            $account = $this->accountService->register($registerRequest);

            http_response_code(200);
            echo json_encode([
                'data' => [
                    'username' => $account->account->username,
                    'name' => $account->account->name,
                    'email' => $account->account->email
                ]
            ]);

        } catch (ValidationException $e) {
            http_response_code(400);
            echo json_encode([
                'errors' => $e->getMessage()
            ]);
            exit();

        }
    }

    public function login()
    {
        try {
            $json = file_get_contents('php://input');
            $request = json_decode($json);

            if (!isset($request->username) || !isset($request->password)) {
                throw new ValidationException("username and password is required");
            }

            $loginRequest = new AccountLoginRequest();
            $loginRequest->username = $request->username;
            $loginRequest->password = $request->password;

            $token = $this->accountService->login($loginRequest);

            http_response_code(200);
            echo json_encode([
                'data' => [
                    'token' => $token->token
                ]
            ]);
        } catch (ValidationException $e) {
            http_response_code(400);
            echo json_encode([
                    'errors' => $e->getMessage()
            ]);
            exit();

        }
    }
    
    public function current()
    {
        try {
            $headers = apache_response_headers();

            if($headers['user'] == null || !isset($headers['user'])){
                throw new ValidationException("Unauthorized");
            }
            
            $user = json_decode($headers['user']);
            http_response_code(200);
            echo json_encode([
                'data' => $user
            ]);
            
        } catch (ValidationException $e) {
            http_response_code(400);
            echo json_encode([
                    'errors' => $e->getMessage()
            ]);
            exit();
        }
    }

    public function update()
    {
        try {
            $headers = apache_response_headers();
            if(!isset($headers['user']) || $headers['user'] == null){
                throw new ValidationException("Unauthorized");
            }
            $user = json_decode($headers['user']);

            $json = file_get_contents('php://input');
            $request = json_decode($json);

            $updateRequest = new AccountUpdateProfileRequest();
            $updateRequest->username = $user->username;

            if(isset($request->name) && $request->name != null){
                $updateRequest->name = $request->name;
            }
            
            if(isset($request->profile_pic) && $request->profile_pic != null){
                $updateRequest->profile_pic = $request->profile_pic;
            }

            $account = $this->accountService->updateUser($updateRequest);
            http_response_code(200);
            echo json_encode([
                'data' => [
                    'username' => $account->account->username,
                    'name' => $account->account->name,
                    'email' => $account->account->email,
                    'profile_pic' => $account->account->profile_pic,
                ]
            ]);

        } catch (ValidationException $e) {
            http_response_code(400);
            echo json_encode([
                    'errors' => $e->getMessage()
            ]);
            exit();
        }
    }

    public function password()
    {
        try {
            $headers = apache_response_headers();
            if(!isset($headers['user']) || $headers['user'] == null){
                throw new ValidationException("Unauthorized");
            }
            $user = json_decode($headers['user']);

            $json = file_get_contents('php://input');
            $request = json_decode($json);
            if(!isset($request->old_password) || !isset($request->new_password) || $request->old_password == null || $request->new_password == null){
                throw new ValidationException("old_password and new_password is required");
            }

            $passwordRequest = new AccountPasswordRequest();
            $passwordRequest->username = $user->username;
            $passwordRequest->oldPassword = $request->old_password;
            $passwordRequest->newPassword = $request->new_password;
            $account = $this->accountService->changePassword($passwordRequest);

            http_response_code(200);
            echo json_encode([
                'data' => [
                    'username' => $account->account->username,
                    'name' => $account->account->name,
                    'email' => $account->account->email,
                    'profile_pic' => $account->account->profile_pic,
                ]
            ]);
            
        } catch (ValidationException $e) {
            http_response_code(400);
            echo json_encode([
                    'errors' => $e->getMessage()
            ]);
            exit();
        }
    }

    public function remove()
    {
        try {
            
        } catch (ValidationException $e) {
            
        }
    }
}
