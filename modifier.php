
<?php 
  require 'db.php';
  
  $id=$_GET['id'];
  $sql = 'SELECT * FROM client where id=:id';
  $statement = $connection->prepare($sql);
  $statement->execute([':id'=>$id]);
  $cle=$statement->fetch(PDO::FETCH_OBJ);

  
if (isset($_POST['nom']) && isset($_POST['email'])) {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $image = $_POST['image'];
  $sql = 'UPDATE client SET nom=:nom , email=:email , image=:image where id=:id';
  
  $statement = $connection->prepare($sql);

  if ($statement->execute([':nom'=>$nom,':email'=>$email,':image'=>$image,':id'=>$id])) {
    header("Location: index.php");
  }
}
 
  
   ?>


<?php require 'header.php' ?>
<div class="container mt-5">
  <div class="card">
  <div class="card-header">
    <h2>modifier un client :</h2>
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
    <input type="text" value="<?= $cle->nom ?>" class="form-control" name="nom" id="nom" placeholder="Enter nom">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" value="<?= $cle->email ?>" class="form-control" id="email" name="email" placeholder="entrer email">
  </div>
  <div class="form-group">
    <label for="image">Example file input</label>
    <input type="file" id="image" name="image" class="form-control-file" >
  </div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
</div>

<?php require 'footer.php' ?>