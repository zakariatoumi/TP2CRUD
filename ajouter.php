
<?php 
  require 'db.php';
  $message='';

  
if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['image'])) {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $image = $_POST['image'];
   $sql = 'INSERT INTO client (nom,email,image) VALUES (:nom,:email,:image)';
  $statement = $connection->prepare($sql);

  if ($statement->execute([':nom'=>$nom,':email'=>$email,':image'=>$image])) {
    $message='exesite';
  }
}
 
  
   ?>


<?php require 'header.php' ?>
<div class="container mt-5">
  <div class="card">
  <div class="card-header">
    <h2>ajouter un client :</h2>
  </div>

<div class="card-body">
  <?php if (!empty($message)): ?>
    
    <div class="alert alert-success">
      
      <?= $message; ?>
    </div>
   
    
  <?php endif; ?>
  

</div>

    <form method="POST">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" name="nom" id="nom" placeholder="Enter nom">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="entrer email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

  <div class="form-group">
    <label for="image">Example file input</label>
    <input type="file" id="image" name="image" class="form-control-file" >
  </div>

</form>
</div>
</div>

<?php require 'footer.php' ?>