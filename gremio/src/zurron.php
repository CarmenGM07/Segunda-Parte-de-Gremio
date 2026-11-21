<?php
/**
 * =====================================================================
 *  zurron.php · Mi zurrón: misiones aceptadas · PLANTILLA DEL ALUMNO
 * =====================================================================
 *  PARTE 2 (listar y total) · PARTE 3 (los datos viven en $_SESSION)
 */

declare(strict_types=1);

require_once __DIR__ . '/inc/funciones.php';
require_once __DIR__ . '/inc/sesion.php';

iniciarSesion();
$aventurero = requiereLogin();
$misiones   = require __DIR__ . '/inc/datos_misiones.php';
$_SESSION['zurron'] ??= [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: abandonar la misión $_POST['id'] del zurrón.
    //  Pista: array_search(..., true), unset y array_values para reindexar.
    //  Mensaje flash y redirección a zurron.php.
     $id = $_POST['id'] ?? '';
     $pos = array_search($id, $_SESSION['zurron'],true);

     if($pos !== false){
        unset($_SESSION['zurron'][$pos]);
        $_SESSION['zurron'] = array_values($_SESSION['zurron']);
        mensajeFlash('Misión abandonada.');
     }

     header('Location: zurron.php');
     exit;
}

$ids   = $_SESSION['zurron'];
$total = totalRecompensa($misiones, $ids);
$flash = leerFlash();

$titulo = 'Mi zurrón';
require __DIR__ . '/inc/cabecera.php';
?>
<h1>Mi zurrón</h1>
<?php if ($flash !== null): ?><p class="aviso"><?= e($flash) ?></p><?php endif; ?>

<?php if (empty($ids)): ?>
<!--
 * TODO: si el zurrón está vacío, enlace al tablón.
 * Si no, una <table> con: Misión · Rango · Recompensa · botón "Abandonar"
 * (formulario POST con el id oculto) y una fila final con la recompensa total.
 */
-->
    <p>Tu zurrón está vacío. <a href="tablon.php">Volver al tablón</a></p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Misión</th>
                    <th>Rango</th>
                    <th>Recompensa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ids as $id): ?>
                    <?php $mision = buscarMision($misiones, $id); ?>
                    <?php if ($mision !== null): ?>
                        <tr>
                            <td><?= e($mision['titulo']) ?></td>
                            <td><span class="<?= e(claseRango($mision['rango'])) ?>"><?= e($mision['rango']) ?> · <?= e(etiquetaRango($mision['rango'])) ?></span></td>
                            <td><?= e(formatearOro($mision['recompensa'])) ?></td>
                            <td>
                                <form method="post" action="zurron.php">
                                    <input type="hidden" name="id" value="<?= e($mision['id']) ?>">
                                    <button type="submit">Abandonar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Recompensa total</td>
                    <td colspan="2"><?= e(formatearOro($total)) ?></td>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>


    
<p class="nota">El zurrón vive en la sesión: si sales del gremio, se vacía.</p>
<?php require __DIR__ . '/inc/pie.php'; ?>
