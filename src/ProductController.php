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
            }
        }
    }
?>