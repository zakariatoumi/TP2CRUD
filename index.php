<?php 
require 'db.php';

$sql = 'SELECT * FROM client';
$statement = $connection->prepare($sql);
$statement->execute();
$client = $statement->fetchAll(PDO::FETCH_OBJ);

 ?>


<?php require 'header.php' ?>
<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			<h2>Tout les clients</h2>
		</div>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
      <th>image</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($client as $cle): ?>

    <tr>
      <th scope="row">1</th>
      <td><?= $cle->id; ?></td>
      <td><?= $cle->nom; ?></td>
      <td><?= $cle->email; ?></td>
      <td><img src="<?= $cle->image; ?>" ></td>
      <td>
      	<a href="modifier.php?id=<?= $cle->id ?>" class="btn btn-primary">modifier</a>
      	<a href="supprimer.php?id=<?= $cle->id ?>" class="btn btn-danger">supprimer</a>

      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
  </div>
<?php require 'footer.php' ?>