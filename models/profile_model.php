<?php 
class profileModel {
    public $nickname;
    public $email;
    public $uid;

    public function __construct($nickname, $email, $uid) {
        $this->nickname = $nickname;
        $this->email = $email;
        $this->uid = $uid;
    }
}
?>