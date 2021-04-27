<?php
class User
{
    private $login;
    private $status;
    private $name;
    private $surname;
    private $id;
    private $avatar;

    public function __construct($l, $st, $n, $sn, $i, $a)
    {
        $this->login = $l;
        $this->status = $st;
        $this->name = $n;
        $this->surname = $sn;
        $this->id = $i;
        $this->avatar = $a;
    }

    public function getLogin() {return $this->login;}
    public function getStatus() {return $this->status;}
    public function getName() {return $this->name;}
    public function getSurname() {return $this->surname;}
    public function getId() {return $this->id;}
    public function getAvatar() {return $this->avatar;}

    public function setLogin($l) {$this->login = $l;}
    public function setStatus($st) {$this->status = $st;}
    public function setName($n) {$this->name = $n;}
    public function setSurname($sn) {$this->surname = $sn;}
    public function setId($i) {$this->id = $i;}
    public function setAvatar($a) {$this->avatar = $a;}
}
?>