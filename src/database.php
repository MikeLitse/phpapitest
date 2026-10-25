<?php 
    class Database{
        public function __construct(private string $host,private string $name,private string $user,private string $password,){

        }

        public function getConnection(): PDO{
            $dsn=
                "mysql:host={$this->host};
                name={$this->name};
                user={$this->user};
                password={$this->password};"
            ;

            return new PDO($dsn, $this->user, $this->password);
        }
    }
?>