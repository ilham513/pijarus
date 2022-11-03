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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


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
	  <div class="container mb-3 alert alert-info p-4 px-3 rounded">
		<form method="post" action="<?= site_url('Welcome/go/')?>">
		<div class="row">
			<div class="col px-3">
				<p class="mb-2">Filter Daerah <sup><button type="button" class="btn rounded-pill btn-sm btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Gunakan ctrl untuk multiple choice">?</button><sup></p>
				  <select name="list_daerah[]" class="form-select" multiple>
				  <?php foreach($list_daerah as $row): ?>
					  <option value="<?= $row->area_id ?>"><?= $row->area_name ?></option>
				  <?php endforeach; ?>
				  </select>			
			</div>
			<div class="col">
			  2 of 3
			</div>
			<div class="col">
			  <button type="submit" class="btn mt-2 btn-success">View</button>
			</div>
		</div>
		</form>
	  </div>
	  
	<div class="mb-3">
	  <canvas id="myChart"></canvas>
	</div>
	  
	  <table class="table mt-3 table-striped table-hover">
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

<script>
<?php
foreach($tabel as $row){
	$area[] = $row->area_name;
	$persen[] = round($row->sum / $row->row * 100);
}
$js_area = json_encode($area);
$js_persen = json_encode($persen);
?>

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=$js_area?>,
        datasets: [{
            label: 'Nilai',
            data: <?=$js_persen?>,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

</script>

  
  </body>
</html>