<?php
//Trie les categorie
function category($product):array{
    $catgrp = array_map(fn($a)=>$a['category'],$product);
    $category = array_reduce($catgrp,function($acc,$cat){
        if (isset($acc[$cat])) {
            $acc[$cat]++;
        }else{
            $acc[$cat] = 1;
        }
        return $acc;
    },[]);
    return $category;
}

//Trie les Produits Par Categorie
function productPerCategory($product):array{
    
   $tab = array_reduce($product,function($acc,$prod){
        if (isset($acc[$prod['category']])) {
            $acc[$prod['category']] = array_merge($acc,$prod['category']);
            // [...$acc[$prod['category']],$prod]
        } else{
            $acc[$prod['category']] = $prod;
        }
       
      return $acc;
     },[]);
    
    return $tab;
}
?>