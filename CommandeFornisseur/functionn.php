<?php
$connection = mysqli_connect("localhost", "root", "", "ggestion_stock");

if (isset($_POST["action"]) && $_POST["action"] == "delete") {
  delete();
}

function delete() {
  global $connection;
  $id = $_POST["id"];
  
  // Create a temporary table to store the IDs of the records to be deleted
  $tempTableQuery = "CREATE TEMPORARY TABLE temp_ids
  SELECT cmd.`No`
  FROM `commandesfornissuer` AS cmd
  JOIN `fornisseur` AS fr ON cmd.`ID_Fornisseur` = fr.`ID`
  WHERE fr.`ID` IN (
    SELECT cmd.`ID_Fornisseur`
    FROM `article de commande fornisseur` AS ac
    JOIN `commandesfornissuer` AS cmd ON ac.`id_commandes` = cmd.`No`
    WHERE ac.`id_article` = $id
  )";
  
  if (mysqli_query($connection, $tempTableQuery) === FALSE) {
    echo json_encode(0);
    return;
  }
  
  // Get the quantity of the article before deletion
  $selectSql = "SELECT Quantite FROM `commandesfornissuer` AS cmd JOIN `article de commande fornisseur` AS ac ON cmd.`No` = ac.`id_commandes` WHERE ac.id_article = $id;";
  $selectStmt = mysqli_query($connection, $selectSql);
  $row = mysqli_fetch_assoc($selectStmt);
  $originalQuantity = $row['Quantite'];
  
  // Delete the records from the main table based on the temporary table
  $deleteQuery = "DELETE FROM `article de commande fornisseur`
  WHERE `id_commandes` IN (SELECT `No` FROM temp_ids)
  AND `id_article` = $id";
  $result = mysqli_query($connection, $deleteQuery);
  
  if ($result) {
    // Update the quantity of the article by adding the original quantity
    $updateSql = "UPDATE `article` SET Quantite = Quantite + $originalQuantity WHERE ID = $id";
    $updateStmt = mysqli_query($connection, $updateSql);
  }
  
  if ($result) {
    echo json_encode(1);
  } else {
    echo json_encode(0);
  }
  
  // Drop the temporary table
  $dropTableQuery = "DROP TEMPORARY TABLE IF EXISTS temp_ids";
  mysqli_query($connection, $dropTableQuery);
}

mysqli_close($connection);
?>
