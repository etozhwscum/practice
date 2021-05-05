<?php


class User extends Model
{
    public $login;
    public $password;
    public $role;

    public function save()
    {
        try {
            $sth = $this->db->prepare("INSERT INTO `". $this->name() .
                "` SET `login` = :login, `password` = :password, id_role = 2");
            $sth->execute(array('login' => $this->login, 'password' => $this->password));
        } catch (PDOException $e) {
            return ['error' => 'An error occurred while executing the query', 'status' => false, 'PDOcode'=>$e->getMessage()];
        }
        return ['status' => true];
    }

    public function authentication()
    {
        $data = $this->getModel('login, password, id_role');
        $exist = false;
        for ($i = 0; $i < count($data); ++$i) {
            if (($exist = ($data[$i]['login'] == $this->login)) && $data[$i]['password'] == $this->password) {
                $this->role = $data[$i]['id_role'];
                return ['status' => true];
            }
        }
        $error = $exist == true ? 'Invalid username and password' : 'This user does not exist.';
        return ['error'=> $error, 'status' => false];
    }

    public function uniqueLogin()
    {
        $data = $this->getModel('login');
        for ($i = 0; $i < count($data); ++$i) {
            if (in_array($this->login, $data[$i])) return ['error' => 'This user already exists.', 'status' => false];
        }
        return ['status' => true];
    }

    public function getRole($id)
    {
        return $this->db->query("SELECT * FROM `role` WHERE id =".$id)->fetch();
    }

    public function getUser($id)
    {
        return $this->db->query("SELECT * FROM `user` WHERE id =".$id)->fetch();
    }

    public function update()
    {
        try {
            $sth = $this->db->prepare("UPDATE `". $this->name() .
                "` SET `login` = :login, `password` = :password WHERE user.id={$this->id}");
            $sth->execute(array('login' => $this->login, 'password' => $this->password));
        } catch (PDOException $e) {
            return ['error' => 'An error occurred while executing the query', 'status' => false, 'PDOcode'=>$e->getMessage()];
        }
        return ['status' => true];
    }
}