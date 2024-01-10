<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'abonnement </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn">Afficher modal</label>
  <div class="wrapper">
    <label for="toggle">
    <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="far fa-envelope"></i></div>
    <div class="content">
      <header>Devenir abonné </header>
      <p>Abonnez-vous à notre blog et recevez les dernières mises à jour directement dans votre boîte de réception.</p>
    </div>
    <form action="index.php" method="POST">
    <?php 
    $userEmail = ""; //nous d'abord le champ email vide
    if(isset($_POST['subscribe'])){ //si le bouton d'abonnement est cliqué 
      $userEmail = $_POST['email']; //obtention de l'e-mail saisi par l'utilisateur
      if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validation de l'email user
        $subject = "Merci de vous être abonné";
        $message = "Merci de vous être abonné à notre blog. Vous recevrez toujours des mises à jour de notre part. Et nous ne partagerons ni ne vendrons vos informations.";
        $sender = "From: shahiprem7890@gmail.com";
        //php function to send mail
        if(mail($userEmail, $subject, $message, $sender)){
          ?>
         <!-- afficher le message de réussite une fois l'e-mail envoyé avec succès -->
          <div class="alerte succès-alerte">
            <?php echo "Merci de vous être abonné." ?>
          </div>
          <?php
          $userEmail = "";
        }else{
          ?>
          <!-- afficher un message d'erreur si le courrier ne peut pas être envoyé -->
          <div class="alerte erreur-alerte">
          <?php echo "Échec lors de l'envoi de votre courrier !" ?>
          </div>
          <?php
        }
      }else{
        ?>
        <!-- safficher un message d'erreur si l'e-mail saisi par l'utilisateur n'est pas valide  -->
        <div class="alert erreur-alert">
          <?php echo "$userEmail n'est pas une adresse email valide !" ?>
        </div>
        <?php
      }
    }
    ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Adresse Email" required value="<?php echo $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="subscribe">Abonnez-vous</button>
      </div>
    </form>
    <div class="text">Nous ne partageons pas vos informations. </div>
  </div>

</body>
</html>
