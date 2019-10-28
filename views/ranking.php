<?php require_once('layouts/header.php'); ?>

<style type="text/css">
    table{
        width:100%;
        table-layout: fixed;
        overflow-wrap: break-word;
        text-align: center;
    }
</style>

<table>
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Intentos</th>
        <th scope="col">Tiempo</th>
    </thead>
    <tbody>
        <?php
            for ($i = 0; $i < 1; $i++) {
              echo '<tr>';
              echo '<td>'.($i + 1).'</td>';
              echo '</tr>';
            }
        ?>
    </tbody>
</table>

<?php require_once('layouts/footer.php'); ?>
