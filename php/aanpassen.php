<?php

include '../private/connection.php';

function renewData($id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM parts WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function geldigBody(){
    if(isset($_POST['resultaat']) && isset($_POST['naam']) && isset($_POST['type']) && isset($_POST['price'])){
        return true;
    } else {
        return false;
    }
}


if (geldigBody());
{
    $id = $_POST['resultaat'];
    $naam = $_POST['naam'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    $opties = array(
        $naam => strlen($naam),
        $type => strlen($type),
        $price => strlen($price)
    );


        $data = renewData($id);

        foreach($opties as $k => $v){
            if($v > 1){
                if($k == $naam){
                    $stmt = $conn->prepare("UPDATE parts SET `naam` = :naam, `type` = :type, `price` = :price  WHERE `id` = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                    $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
                    $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
                    $stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);
                    $stmt->execute();


                    $data = renewData($id);
                } else if($k === $type){
                    $stmt = $conn->prepare("UPDATE parts SET `naam` = :naam, `type` = :type, `price` = :price  WHERE `id` = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                    $stmt->bindParam(':naam', $data['naam'], PDO::PARAM_STR);
                    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
                    $stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);
                    $stmt->execute();


                    $data = renewData($id);

                } else if ($k === $price){
                    $stmt = $conn->prepare("UPDATE parts SET `naam` = :naam, `type` = :type, `price` = :price  WHERE `id` = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                    $stmt->bindParam(':naam', $data['naam'], PDO::PARAM_STR);
                    $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
                    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
                    $stmt->execute();


                    $data = renewData($id);
                }
            } else {
                $stmt = $conn->prepare("UPDATE parts SET `naam` = :naam, `type` = :type, `price` = :price  WHERE `id` = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->bindParam(':naam', $data['naam'], PDO::PARAM_STR);
                $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
                $stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);
                $stmt->execute();


                $data = renewData($id);
            }
        }
}

header('location: ../index.php?page=adminwelkom');