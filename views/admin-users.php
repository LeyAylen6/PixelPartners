<?php
include_once 'class/User.php';
include_once 'class/db/mysqli.php';

$user = new User();
$users = $user->findAll($connection);

?>

<?php if (isset($_GET["action"])) { 
    include_once 'confirm-modal.php'; 
} ?> 

<article class="p-0 m-0 my-5 row justify-content-center">
    <div class="col-11 col-xl-8 card shadow p-4 vh-55">
        <h2 class="mb-4 text-center">Gestión de usuarios</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Es Empleado?</th>
                    <th>Cargo</th>
                    <th>Rol</th>
                    <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->name ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->job ? 'Si' : 'No' ?></td>
                            <td><?= $user->job ? $user->job : '-' ?></td>
                            <td><?= $user->rol ?></td>
                            <td>
                            <?php if ($user->rol === 'admin'): ?>
                                <span class="btn btn-sm bg-secondary">Ya es Admin</span>
                            <?php else: ?>
                                <a 
                                    class="btn btn-sm btn-success" 
                                    href="index.php?page=admin-users&action=make-admin&message=¿Estás seguro de hacer admin a <?= $user->name ?>?&id=<?= $user->id ?>"
                                    >
                                    Hacer Admin
                                </a>
                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</article>

