<?php

namespace App\Src\Repository;

use App\Core\abstract\AbstractRepository;
use App\Src\Entity\User;
use App\Core\Database;

class UserRepository extends AbstractRepository
{
    private Database $db;

    private string $tableName = 'user';
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function selectByTelephone($telephone): ?User
    {
        try {
            $sql = 'Select * 
               from utilisateur 
               where  numeroTelephone= :telephone';

            $stmt = $this->db->getPDO()->prepare($sql);
            $stmt->execute([
                ':telephone' => $telephone
            ]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                $user = User::toObject($result);
                //    var_dump($user);
                //    die();

                return $user;
            }
            return null;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }





     public function selectAll(){}
     public function insert(){}
     public function update(){}
     public function delete(){}
     public function selectById(){}
     public function selectBy(array $filter){}

}
