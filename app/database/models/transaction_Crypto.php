<?php

class transactionCrypto{
   private  PDOStatement $statementSelectTranst; 
   private PDOStatement $statementSelectLastTranst;

   function __construct(private PDO $pdo){

    $this->statementSelectTranst = $pdo->prepare('SELECT * FROM bxc_transactions');
    $this->statementSelectLastTranst = $pdo->prepare('SELECT * FROM shop.bxc_transactions ORDER BY creation_time DESC');

}

function ReadTransat(){
    $this->statementSelectTranst->execute();
   return $this->statementSelectTranst->fetchAll();

}
function SelectLastTranst(){
    $this->statementSelectLastTranst->execute();
    return $this->statementSelectLastTranst->fetchAll();
}

}
return new transactionCrypto($pdo);



