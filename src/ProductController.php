<?php 
    class ProductController{

        public function __construct(private ProductGateway $gateway){
            
        }
        //handles https
        public function processRequest(string $method, ?string $id): void{
            if($id){
                $this->processResourceRequest($method,$id);
            }else{
                $this->processControllerRequest($method);
            }
        }

        private function processResourceRequest(string $method, string $id): void{

        }

        private function processControllerRequest(string $method): void{
            switch($method){
                case "GET":
                    echo json_encode($this->gateway->getAll());
                    break;
                case "POST":
                    //cast into array so it doesnt return null
		            $data= (array) json_decode(file_get_contents("php://input"),true); //true returns a assoc array

                    $id= $this->gateway->create($data);

                    echo json_encode([
                        "message" => "Product Created",
                        "id" => $id
                    ]);
                    break;
            }
        }
    }
?>
