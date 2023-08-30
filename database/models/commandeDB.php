<?php
class commandeDB {
    private PDOStatement $statementCreateCommande;
    private PDOStatement $statementselectOne;
    
    private PDOStatement $statementUpdateOne;
    private PDOStatement $statementSelectLastCommande;

    function __construct(private PDO $pdo)
    {
        $this->statementCreateCommande = $pdo->prepare('INSERT INTO commande(
            emailCustomer,
            idProduct,
            date,
            idtransaction,
            etat,
            crypto,
            usd,
            nameCustomer,
            EmailDelivery,
            idCustomer,
            nameProduct
            
        )VALUES(
            :emailCustomer,
            :idProduct,
            :date,
            :idtransaction,
            :etat,
            :crypto,
            :usd,
            :nameCustomer,
            :EmailDelivery,
            :idcustomer,
            :nameProduct
        )');

        $this->statementselectOne = $pdo->prepare('SELECT * FROM commande WHERE idtransaction = :id_bxc_transat');
    
        $this->statementSelectLastCommande = $pdo->prepare('SELECT * FROM commande ORDER BY idcommande DESC');
        $this->statementUpdateOne = $pdo->prepare('UPDATE commande SET
        idtransaction=:idtransaction,
        crypto=:crypto,
        etat=:etat,
        WHERE idcommande=:idcommande
        
        ');
        // $this->statementUpdateOne = $pdo->prepare('')

    }

    function addCommande($emailCustomer,$idProduct,$date,$idtransaction,$etat,$crypto,$usd,$nameCustomer,$EmailDelivery,$idcustomer,$nameProduct){
        $this->statementCreateCommande->bindValue(':emailCustomer',$emailCustomer);
        $this->statementCreateCommande->bindValue(':idProduct',$idProduct);
        $this->statementCreateCommande->bindValue(':date',$date);
        $this->statementCreateCommande->bindValue(':idtransaction',$idtransaction);
        $this->statementCreateCommande->bindValue(':etat',$etat);
        $this->statementCreateCommande->bindValue(':crypto',$crypto);
        $this->statementCreateCommande->bindValue(':usd',$usd);
        $this->statementCreateCommande->bindValue(':nameCustomer',$nameCustomer);
        $this->statementCreateCommande->bindValue(':EmailDelivery',$EmailDelivery);
        $this->statementCreateCommande->bindValue(':idcustomer',$idcustomer);
        $this->statementCreateCommande->bindValue(':nameProduct',$nameProduct);



        
        $this->statementCreateCommande->execute();
    

    }

    function selectOne($id_bxc_transaction){
        $this->statementselectOne->bindValue(':id_bxc_transat',$id_bxc_transaction);
        $this->statementselectOne->execute();
        return $this->statementselectOne->fetch();

    }
    function SelectLastCommande(){
        $this->statementSelectLastCommande->execute();
        return $this->statementSelectLastCommande->fetchAll();
    }
    public function updateOneCommande($idtransaction,$crypto,$etat,$idcommande){
        $this->statementUpdateOne->bindValue(':idtransaction',$idtransaction);
        $this->statementUpdateOne->bindvalue(':crypto',$crypto);
        $this->statementUpdateOne->bindvalue(':etat',$etat);
        $this->statementUpdateOne->bindvalue(':idcommande',$idcommande,);


        return  $this->statementUpdateOne->execute();    
       

        
    }


}
return new commandeDB($pdo);