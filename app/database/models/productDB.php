<?php

class productDB{
    private PDOStatement $statementCreateOne;
    private PDOStatement $statementReadOne;
    private PDOStatement $statementReadAll;
    private PDOStatement $statementReadOneBYiD;
    

    private PDOStatement $statementUpdateOne;
    private PDOStatement $statementDeleteOne;
    

    function __construct(private PDO $pdo)
    {
        $this->statementCreateOne = $pdo->prepare('INSERT INTO product (
            name,
            category,
            image,
            description,
            prix
        ) VALUES (
            :name,
            :category,
            :image,
            :description,
            :prix
        ) ');

        $this->statementReadAll = $pdo->prepare('SELECT * FROM product');
        $this->statementReadOne = $pdo->prepare('SELECT * FROM product WHERE category =:category');
        $this->statementReadOneBYiD = $pdo->prepare('SELECT * FROM product WHERE id =:id');




    }
    public function fetchById($id){
        $this->statementReadOneBYiD->bindValue(':id',$id);
        $this->statementReadOneBYiD->execute();
        return $this->statementReadOneBYiD->fetch();
    }
     public function fetchAllCategory($category){
        $this->statementReadOne->bindValue(':category',$category);
        $this->statementReadOne->execute();
        return $this->statementReadOne->fetchAll();
     }
     public function fetchAll():array{
        $this->statementReadAll->execute();
       return $this->statementReadAll->fetchAll();
     }
     
    public function createOne($product){
        $this->statementCreateOne->bindValue(':name',$product['nom']);
        $this->statementCreateOne->bindValue(':category',$product['category']);
        $this->statementCreateOne->bindValue(':image',$product['image']);
        $this->statementCreateOne->bindValue(':description',$product['description']);
        $this->statementCreateOne->bindValue(':prix',$product['prix']);

        $this->statementCreateOne->execute();
       
    }

    

    
}
return new ProductDB($pdo);