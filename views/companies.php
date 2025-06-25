<?php
require_once __DIR__ . '/../class/db/mysqli.php';
require_once __DIR__ . '/../class/Company.php';
$company = new Company();
$empresas = $company->findAll($connection);
?>
<section class="empresas-confianza" style="min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;background:linear-gradient(120deg,#ede9fe 0%,#f3e8ff 100%);padding:4vw 0;">
  <h1 style="font-size:2.7rem;color:#7c3aed;font-weight:900;margin-bottom:2.5rem;text-align:center;">Empresas que confiaron en nosotros</h1>
  <div class="empresas-lista" style="display:flex;flex-wrap:wrap;gap:2.5rem;justify-content:center;align-items:center;width:100%;max-width:1200px;margin:0 auto;">
    <?php if ($empresas && count($empresas) > 0): ?>
      <?php foreach ($empresas as $empresa): ?>
        <article class="empresa-card" style="background:#fff;border-radius:1.5rem;box-shadow:0 2px 18px rgba(124,58,237,0.09);padding:2rem 2vw 1.5rem 2vw;display:flex;flex-direction:column;align-items:center;min-width:220px;max-width:270px;">
          <figure style="margin-bottom:1.2em;">
            <img src="<?= htmlspecialchars($empresa->logo) ?>" alt="<?= htmlspecialchars($empresa->name) ?> logo" style="width:100px;height:100px;object-fit:contain;border-radius:16px;background:#f3f4f6;border:1.5px solid #ede9fe;box-shadow:0 2px 10px rgba(124,58,237,0.07);" loading="lazy">
          </figure>
          <h2 style="font-size:1.18rem;color:#2563eb;font-weight:700;text-align:center;word-break:break-word;"><?= htmlspecialchars($empresa->name) ?></h2>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="font-size:1.15rem;color:#444;text-align:center;">No hay empresas registradas aún.</p>
    <?php endif; ?>
  </div>
</section>
