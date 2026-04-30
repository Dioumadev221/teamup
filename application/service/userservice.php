<?php
require_once 'dal/userdao.php';
require_once 'models/userentity.php';

class UserService
{
    public function adduser(UserEntity $user)
    {
        $dao = new UserDAO();
        $dao->adduser($user);
    }

    public function getuserlist($filtrenom = null)
    {
        $dao = new UserDAO();
        return $dao->getuserlist($filtrenom);
    }
}
