<?php

    class Database{

        private $db;

        public function __construct( $db ){
            $this->db = $db;
        }

        public function query( $query. $tokens = false){
            $statement = $this->db->prepare($query);

            if($tokens){
                foreach($tokens as $token => $tokenValue){
                    $statement->bindValue($token, $tokenValue);
                }
            }

            $statement->execute();

            $fieldnames = array();

            for ($fieldNumber = 0; $fieldNumber < $statement->ColumnCount(); ++$fieldNumber){
                $fieldnames[] = $statement->getColumnMeta($fieldNumber)['name'];
            }

            $data = array();

            while($row = $statement-> fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }

            $returnArray['fieldnames'] = $fieldnames;
            $returnArray['data']       = $data;

            return $returnArray;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
</head>
<body>
    
</body>
</html>