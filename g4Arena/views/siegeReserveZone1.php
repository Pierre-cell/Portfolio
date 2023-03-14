<?php
if (isset($_SESSION['user'])) {
?>
    <td>
        <form action="./siegeZone1_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
            <button class="btnsiegeCoReserve" type="submit" name="envoyerreserve" value=<?= $ligne['id'] ?> DISABLED>
                <img class="siegesCoReserve" src="/ressources/img/siegereserve.svg" id="<?= $ligne['id'] ?>">
            </button>
        </form>
    </td>
<?php
}
?>

<?php
if (empty($_SESSION['user'])) {
?>
    <td>
        <form action="./siegeZone1_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
            <button class="btnsiege" type="submit" name="envoyerreserve" value=<?= $ligne['id'] ?> disabled>
                <img class="siegesCoReserve" src="/ressources/img/siegereserve.svg" id="<?= $ligne['id'] ?>">
            </button>
        </form>
    </td>
<?php
}
?>