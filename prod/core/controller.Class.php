<?php
class Connect extends PDO{
    public function __construct(){
        parent::__construct("mysql:host=sql202.epizy.com;dbname=epiz_31292830_SportsRealm", 'epiz_31292830', 'E98DahqaEQJvv',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
class Controller {
    // Print data to the screen
    function printData($id, $sess){
        $db = new Connect;
        $user = $db -> prepare("SELECT * FROM users WHERE id=$id AND session='$sess'");
        $user -> execute();
        $content = '
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Avatar</th>
                <th scope="col">Email</th>
                <th scope="col">BetBux</th>
                </tr>
            </thead>
            <tbody>';
        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
            $content .= '
            <tr>
                <td>'.$userInfo["f_name"].'</td>
                <td>'.$userInfo["l_name"].'</td>
                <td><img style="max-width: 50px;" src="'.$userInfo["avatar"].'" alt="User Avatar"></td>
                <td>'.$userInfo["email"].'</td>
                <td>'.$userInfo["betbux"].'$</td>
            </tr>
            ';
        }
        $content .= '</tbody></table>
        ';
        return $content;
    }

    function currentMatches() {
        $db = new Connect;
        $user = $db -> prepare("SELECT * FROM `matches`");
        $user -> execute();
        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)) {
            $content .= $userInfo;
        }
        return $content;
    }

    function updateMatches($matchid, $status) {
        $db = new Connect;
        $user = $db -> prepare("INSERT IGNORE INTO matches VALUES (:matchid,:status)");
        $user -> execute([
            ':matchid'   => $matchid,
            ':status'    => $status
        ]);
        return "asdfasdfsadfa";
    }

    function cleanMatches() {
        $db = new Connect;
        $user = $db -> prepare("DELETE FROM `matches` WHERE `status` != \"Not Started\"");
        $user -> execute();
        return "asdfasdfsadfa";
    }

    // check if user is logged in
    function checkUserStatus($id, $sess){
        $db = new Connect;
        $user = $db -> prepare("SELECT id FROM users WHERE id=:id AND session=:session");
        $user -> execute([
            ':id'       => intval($id),
            ':session'  => $sess
        ]);
        $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
        if(!$userInfo["id"]){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    // function for generating password and login session
    function generateCode($length){
		$chars = "vwxyzABCD02789";
		$code = ""; 
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length){ 
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
    }
    
    function checkMoney($id, $sess) {
        $db = new Connect;
        $user = $db -> prepare("SELECT betbux FROM users WHERE id=:id AND session=:session");
        $user -> execute([
            ':id'       => intval($id),
            ':session'  => $sess
        ]);
        $userMoney = $user -> fetch(PDO::FETCH_ASSOC);
        return $userMoney["betbux"];
    }

    function changeMoney($amount, $id, $sess) {
        $db = new Connect;
        $user = $db -> prepare("UPDATE users SET betbux=betbux+:amount WHERE id=:id AND session=:session");
        $user -> execute([
            ':amount'   => $amount,
            ':id'       => intval($id),
            ':session'  => $sess
        ]);
        return "asdfasdfsadfa";
    }
    
    function makeBet($amount, $id, $sess) {
        $db = new Connect;
        $user = $db -> prepare("UPDATE users SET betbux=betbux+:amount WHERE id=:id AND session=:session");
        $user -> execute([
            ':amount'   => $amount,
            ':id'       => intval($id),
            ':session'  => $sess
        ]);
        return "asdfasdfsadfa";
    }

    function insertData($data){
        $db = new Connect;
        $checkUser = $db -> prepare("SELECT * FROM users WHERE email=:email");
        $checkUser -> execute(array(
            'email' => $data['email']
        ));
        $info = $checkUser -> fetch(PDO::FETCH_ASSOC);
        
        if(!$info["id"]){
            $session = $this -> generateCode(10);
            $insertNewUser = $db -> prepare("INSERT INTO users (f_name, l_name, avatar, email, password, session) VALUES (:f_name, :l_name, :avatar, :email, :password, :session)");
            $insertNewUser -> execute([
                ':f_name'   => $data["givenName"],
                ':l_name'   => $data["familyName"],
                ':avatar'   => $data["avatar"],
                ':email'    => $data["email"],
                ':password' => $this -> generateCode(5),
                ':session'  => $session
            ]);
            if($insertNewUser){
                setcookie("id", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("sess", $session, time()+60*60*24*30, "/", NULL);
                header('Location: index.php');
                exit();
            }else{
                return "Error inserting user!";
            }
        }else{
            setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
            setcookie("sess", $info["session"], time()+60*60*24*30, "/", NULL);
            header('Location: home.php');
            exit();
        }
    }
}
?>