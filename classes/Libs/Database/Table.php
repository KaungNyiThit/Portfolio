<?php

namespace Libs\Database;
use Exception;
use PDOException;
use PDO;
use Helpers\HTTP;
use Helpers\Auth;

class Table {


    private $db;

    public function __construct(MySQL $db) 
    {
        $this->db = $db->connect();
    }

    public function insert($data)
    {

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");

        $stmt->execute(['email' => $data['email']]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if($existingUser){
            HTTP::redirect("../register.php", "email=exist");
        }else{

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $statement = $this->db->prepare(
                "INSERT INTO users(name, email, password)
                VALUES(:name, :email, :password)"
            );
            $statement->execute($data);
            return $this->db->lastInsertId();
        }
    }

    public function loginUser($name, $email, $password)
    {
        $statement = $this->db->prepare(
            "SELECT * FROM users WHERE name=:name AND email=:email"
        );
        $statement->execute(['name' => $name, 'email' => $email]);
        $users = $statement->fetch();

        if($users){
            if(password_verify($password, $users->password)){
                return $users;
            }
                return false;
        }
    }

    public function updateProfile($data){
        $statement = $this->db->prepare(
            "UPDATE users SET name=:name, email=:email, password=:password WHERE id=:id"
        );
        $statement->execute($data);
        return $this->db->lastInsertId();
    }

    public function getUserInfo(){
        $statement = $this->db->query(
            'SELECT * FROM users'
        );

        return $statement->fetchAll();
    }

    public function update($data){
        $statement = $this->db->prepare("UPDATE admin SET photo=:photo, name=:name, description=:description ");

        $statement->execute($data);
    }

    public function getAdminInfo(){
        $statement = $this->db->query(
            "SELECT * FROM admin "
        );

        return $statement->fetchAll();
    }

    public function project($data){
        $statement = $this->db->prepare(
            "INSERT INTO projects(project_name, project_language, created_at)
            VALUES(:project_name, :project_language, NOW() )"
        );
        $statement->execute($data);
        return $this->db->lastInsertId();
    }

    public function allProject()
    {
        $statement = $this->db->query(
            "SELECT * FROM projects"
        );

        return $statement->fetchAll();
    }

    public function certificate($data)
    {
        $statement = $this->db->prepare(
            "INSERT INTO certificates(certificate_name, date) 
            VALUES(:certificate_name, :date)");

        $statement->execute($data);
        return $this->db->lastInsertId();
    }

    public function allCertificate(){
        $statement = $this->db->query(
            "SELECT * FROM certificates"
        );

        return $statement->fetchAll();
    }

    public function diploma($data)
    {
        $statement = $this->db->prepare(
            "INSERT INTO diplomas(diploma_name, date)
            VALUES(:diploma_name, :date)"
        );

        $statement->execute($data);
        return $this->db->lastInsertId();
    }

    public function allDiploma()
    {
        $statment = $this->db->query(
            "SELECT * FROM  diplomas"
        );

         return $statment->fetchAll();
    }

    public function messages($name, $email, $message, $user_id){

        $statment = $this->db->prepare(
            "INSERT INTO messages(name, email, message, user_id)
            VALUES (:name, :email, :message, :user_id)"
        );

        $statment->execute(['name' => $name, 'email' => $email, 'message' => $message, 'user_id' => $user_id]);
        return $this->db->lastInsertId();
    }


    public function allMessages()
    {
        $auth = Auth::check();
        if($auth->role === 'admin'){
            $statement = $this->db->query(
                "SELECT * FROM messages ORDER BY id DESC"
            );
        }else{
            $statement = $this->db->query(
                "SELECT * FROM messages WHERE user_id = $auth->id"
            );
        }   


        return $statement->fetchAll();
    }

    public function messageRel()
    {
        $statement = $this->db->prepare(
            "SELECT users.*, messages.user_id FROM users LEFT JOIN messages ON messages.user_id = users.id"
        );
        return $statement->fetchAll();
    }

    public function messageView($id)
    {
        $statement = $this->db->prepare(
            "SELECT * FROM messages  WHERE user_id=:id ORDER BY id DESC"
        );

        $statement->execute([ 'id' => $id ]);

        return $statement->fetchAll();
    }

    public function responseView($id)
    {
        $statement = $this->db->prepare(
            "SELECT * FROM messages WHERE id=:id"
        );

        $statement->execute([ 'id' => $id ]);

        return $statement->fetch();
    }

    public function response($id, $response)
    {
        $statement = $this->db->prepare(
            "UPDATE messages SET response = :response, responsed_at = NOW() WHERE id = :id"
        );

        return $statement->execute(['id' => $id,  'response' => $response]);

    }

}
