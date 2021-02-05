<?php 

namespace Products;

class Products 
{
    public static function listProducts($file = 'product.json')
    {
        $filePath = '../App/src/product/'.$file;

        $resources = json_decode(file_get_contents($filePath));
        
        return $resources;
    }

    public static function createProduct(String $produto, Array $ingredients = [], String $description = 'Hi I\'m a product', String $file = 'product.json')
    {
        // O produto terá:
        // Nome | Tipo | Descrição | Ingredientes 
        

        $filePath = '../App/src/product/'.$file;

        $data = [];
        
        $rawData = 
            [
            'data' => [
                "name" => $produto,
                "description" => $description,
                "ingredients" => $ingredients
            ]
            
         ];

        if (file_exists($filePath) and !empty(readfile($filePath))){
           
            $data = json_decode(file_get_contents($filePath));
            
        }
       
        try{
            array_push($data, $rawData);
            if($dataCreated = file_put_contents($filePath, json_encode($data))) {
             
                return true;

            } else{
               
               throw new \Exception('Erro ao Gravar, por favor tente novamente mais tarde.');

            }

        } catch(\Exception $e) {

            echo $e->getMessage();

        }

    }

    public function alterProduct()
    {

    }
}
