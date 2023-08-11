<?php
$title = "Avertissements";

ob_start();

?>

<div class="container">
	<div class="mt-4 pt-4">
		<h4 class="text-danger">Avertissements</h4>
	</div>

	<?php foreach($warnings as $warning): ?>

		<article>
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        
        <div class="col p-4 d-flex flex-column position-static">
          <p class="card-text mb-2">
              <?=$warning['content']?>
          </p>
        </div>
      </div>
    </article>

    <?php endforeach; ?>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>