<?php

class AuthDB {
    private PDOStatement $statementRegister;
    private PDOStatement $statementReadCustomerByEmail;
    private PDOStatement $statementCreateSession;
    private PDOStatement $statementReadSession; 
    private PDOStatement $statementReadCustumer;
    private PDOStatement $statementDeleteSession;
    private PDOStatement $statementReadCustomerByIdSession;


    function __construct(private PDO $pdo)
    {
        $this->statementRegister = $pdo->prepare('INSERT INTO customer VALUES(
            DEFAULT,
            :name,
            :ibtelegram,
            :email,
            :motdepass
        )');

        $this->statementReadCustomerByEmail = $pdo->prepare('SELECT * FROM customer WHERE email=:email');
        $this->statementCreateSession = $pdo->prepare('INSERT INTO session VALUES (
            :idsession,
            :idcustomer
        ) ');
        $this->statementReadSession = $pdo->prepare('SELECT * FROM session WHERE idsession = :idsession');
        $this->statementReadCustumer = $pdo->prepare('SELECT * FROM customer WHERE id = :idcustumer');
        $this->statementDeleteSession = $pdo->prepare('DELETE FROM session where idsession=:idsession');
        $this->statementReadCustomerByIdSession = $pdo->prepare('SELECT * FROM customer WHERE id = :idSessionCustomer');

        
    }
   

   function Inscription(array $customer):void{
        $passwordHash = password_hash($customer['password'],PASSWORD_ARGON2I);
        $this->statementRegister->bindValue(':name',$customer['name']);
        $this->statementRegister->bindValue(':ibtelegram',$customer['ibtelegram']);
        $this->statementRegister->bindValue(':email',$customer['email']);
        $this->statementRegister->bindValue(':motdepass',$passwordHash);
        $this->statementRegister->execute();
       

       return;
    }

   function ReadCustomerByEmail($email){
        $this->statementReadCustomerByEmail->bindValue(':email',$email);
        $this->statementReadCustomerByEmail->execute();
        return $this->statementReadCustomerByEmail->fetch();
        
   }

   function Login($idcustomer){
         $idsession = bin2hex(random_bytes(32));
        $this->statementCreateSession->bindValue(':idsession',$idsession);
        $this->statementCreateSession->bindValue(':idcustomer',$idcustomer);
        $this->statementCreateSession->execute();
        $signature = hash_hmac('sha256',$idsession,'juste rassembler et arreter');
        setcookie('session',$idsession,time()+ 60 * 60 * 24 * 14,'','',false,true);
        setcookie('signature',$signature,time() + 60 * 60 * 24 * 14,'','',false,true);

        return;
     
   }

   function isLoggedin(){
    $idsession = $_COOKIE['session'] ?? '';
    $signature = $_COOKIE['signature'] ?? '';

    if ($idsession && $signature) {
        $hash = hash_hmac('sha256',$idsession,'juste rassembler et arreter');
        if (hash_equals($hash,$signature)) {
            $this->statementReadSession->bindValue(':idsession',$idsession);
            $this->statementReadSession->execute();
            $session = $this->statementReadSession->fetch();

            if ($session) {
                $this->statementReadCustumer->bindValue(':idcustumer',$session['idcustomer']);
                $this->statementReadCustumer->execute();
                $custumer = $this->statementReadCustumer->fetch();
            }
        }
    }
    return $custumer ?? false;
   }
   
   function LogOut($sessionid):void{
    $this->statementDeleteSession->bindValue(':idsession',$sessionid);
    $this->statementDeleteSession->execute();
    setcookie('session','',time() - 1);
    setcookie('signature','',time() - 1);
    return;
   }

   function GetCustomerBySession($idcustomer){
        $this->statementReadCustomerByIdSession->bindValue(':idSessionCustomer',$idcustomer);
        $this->statementReadCustomerByIdSession->execute();
        return $this->statementReadCustomerByIdSession->fetch();
   }

   function ReadSession($idsession){
      $this->statementReadSession->bindValue(':idsession',$idsession);
      $this->statementReadSession->execute();
      return $this->statementReadSession->fetchAll();

   }
}
return new AuthDB($pdo);