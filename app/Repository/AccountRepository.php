<?php
namespace Nurdin\BinaryTalk\Repository;

use Nurdin\BinaryTalk\Domain\Account;
use PDO;

class AccountRepository
{
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function save(Account $account) : Account
    {
        $stmt = $this->connection->prepare("INSERT INTO user(username, email, password, name) VALUES(?, ?, ?, ?)");
        $stmt->execute([$account->username, $account->email, $account->password, $account->name]);

        return $account;
    }

    public function findAccount(string $request, string $option) : ?Account
    {
        if(strtolower($option) === 'username'){
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE username = ?");
        } else if (strtolower($option) === 'email'){
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE email = ?");
        }
        $stmt->execute([$request]);

        if ($row = $stmt->fetch()){
            $account = new Account();
            $account->username = $row['username'];
            $account->email = $row['email'];
            $account->password = $row['password'];
            $account->name = $row['name'];
            $account->profile_pic = $row['profile_pic'];
            return $account;
        } else {
            return null;
        }
    }

    public function update(Account $account) : Account
    {
        $stmt = $this->connection->prepare("UPDATE user SET name = ?, password = ?, profile_pic = ? WHERE username = ?");
        $stmt->execute([$account->name, $account->password, $account->profile_pic, $account->username]);

        return $account;
    }

    public function deleteByUsername(string $username)
    {
        $stmt = $this->connection->prepare("DELETE FROM user WHERE username = ?");
        $stmt->execute([$username]);
    }

    public function findCountPengguna() : array
    {
        $stmt = $this->connection->prepare("SELECT Negara, COUNT(*) AS Jumlah_Pengguna FROM pengguna GROUP BY Negara");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findAllPengguna() : array
    {
        $stmt = $this->connection->prepare("SELECT * FROM pengguna");
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}