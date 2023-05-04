<?php
session_start();
include '../php/connexion.php';
include '../client/Function.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/Dashboard.css" />
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <title>Tableau de bord</title>
</head>

<body>
  <section class="side-bar" id="navbar">
    <div class="logo">
      <span>
        <h4>Easly</h4>
      </span>
    </div>
    <nav class="nav">
      <div class="nav-links">
        <a href="../php/Dashboard.php" class="nav-link" data-page="dashboard">
          <i class="bx bxs-dashboard icon-link" id="icons"></i>
          <span class="name">Tableau de bord</span>
        </a>
        <a href="../php/produits.php" class="nav-link">
          <i class="bx bx-package icon-link" id="icons"></i>
          <span class="name">Produit</span>
        </a>
        <a href="../php/clients.php" class="nav-link">
          <i class="bx bx-user icon-link" id="icons"></i>
          <span class="name">Clients</span>
        </a>
        <a href="../php/Commandes.php" class="nav-link">
          <i class="bx bx-receipt icon-link" id="icons"></i>
          <span class="name">Commandes</span>
        </a>
        <a href="../php/vente.php" class="nav-link">
          <i class="bx bx-cart-add icon-link" id="icons"></i>
          <span class="name">Vente</span>
        </a>
        <a href="../php/fornisseur.php" class="nav-link">
          <i class="bx bxs-store icon-link" id="icons"></i>
          <span class="name">Fornisseur</span>
        </a>
        <a href="#" class="nav-link">
          <i class="bx bx-log-out icon-link" id="icons"></i>
          <span>Déconnexion</span>
        </a>
      </div>
    </nav>
  </section>

  <section class="home-section" >
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Dashboard</span>
      </div>
    </nav>

    <div class="home-content" id="contentall" >
      <div class="overview-boxes">
        <div class="box">
          <div class="details">
            <div class="number">40,876</div>
            <div class="box-topic">Total Order</div>
          </div>
          <i class="bx bx-cart-alt cart"></i>
        </div>
        <div class="box">
          <div class="details">
            <div class="number">38,876</div>
            <div class="box-topic">Total Sales</div>
          </div>
          <i class="bx bxs-cart-add cart two"></i>
        </div>
        <div class="box">
          <div class="details">
            <div class="number">$12,876</div>
            <div class="box-topic">Total Profit</div>

          </div>
          <i class="bx bx-cart cart three"></i>
        </div>
        <div class="box">
          <div class="details">
            <div class="number">11,086</div>
            <div class="box-topic">Total Return</div>
          </div>
          <i class="bx bxs-cart-download cart four"></i>
        </div>
      </div>

      <h4>Liste de clients</h4>
      <div class="tables">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Téléphone</th>
              <th scope="col">Adresse</th>
            </tr>
          </thead>
          <tbody>
            <!-- gat data from database-->
            <?php
            $clients = gatClient();
            if (!empty($clients) && is_array($clients)) {
              foreach ($clients as $key => $value) {
            ?>
                <tr>
                  <th scope="row"><?= $value['ID'] ?></th>
                  <td><?= $value['Nom'] ?></td> <!-- value from database-->
                  <td><?= $value['Prenom'] ?></td> <!-- value from database-->
                  <td><?= $value['Telephone'] ?></td> <!-- value from database-->
                  <td><?= $value['Address'] ?></td> <!-- value from database-->
                 
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </section>
  <script src="../js/Script.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>