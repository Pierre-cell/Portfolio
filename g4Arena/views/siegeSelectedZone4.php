<?php
if (isset($_SESSION['user'])) {
?>
    <td>
        <form action="./siegeZone4_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
            <button class="btnsiegeCo" type="submit" name="envoyerselected" value=<?= $ligne['id'] ?>>
                <img class="siegesCo" src="/ressources/img/siegeselect.svg" id="<?= $ligne['id'] ?>">
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
        <form action="./siegeZone4_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
            <button class="btnsiege" type="submit" name="envoyerselected" value=<?= $ligne['id'] ?> disabled>
                <img class="sieges" src="/ressources/img/siegeselect.svg" id="<?= $ligne['id'] ?>">
            </button>
        </form>
    </td>
<?php
}
?>