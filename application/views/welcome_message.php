<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Untuk kepertuan tes masuk PT. Pitjarus Teknologi">
    <meta name="author" content="Ilham Setia Bhati">
    <title>Visualisasi Data Penjualan</title>

    <!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
	.bd-placeholder-img {
	  font-size: 1.125rem;
	  text-anchor: middle;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  user-select: none;
	}

	@media (min-width: 768px) {
	  .bd-placeholder-img-lg {
		font-size: 3.5rem;
	  }
	}

	.container {
	  max-width: 960px;
	}

	.pricing-header {
	  max-width: 700px;
	}
    </style>
  </head>
  <body>

<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Visualisasi Data Penjualan</span>
      </a>
    </div>
  </header>

  <main>
	  <table class="table table-striped table-hover">
	  <thead class="table-dark">
		<tr>
		  <th scope="col">Brand</th>
		  <th scope="col">Persen</th>
		  <th scope="col">Area Name</th>
		</tr>
	  </thead>
	  <tbody>
	<?php foreach($data_produk as $row): ?>
		<tr>
		  <td><?= $row->brand_name ?></td>
		  <td><?= round($row->sum / $row->row * 100) . "%"?></td>
		  <td><?= $row->area_name ?></td>
		</tr>
	<?php endforeach; ?>
	  </tbody>
	</table>
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
	<small class="d-block mb-3 text-muted">&copy; Nov. 2022</small>
  </footer>
</div>
  
  </body>
</html>