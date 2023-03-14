<?php
if (isset($_SESSION['user'])) {
?>
    <td>
        <form action="./siegeZone3_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
            <button class="btnsiegeCo" type="submit" name="envoyer" value=<?= $ligne['id'] ?>>
                <img class="siegesCo" src="/ressources/img/siegedispo.svg" id="<?= $ligne['id'] ?>">
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
        <form action="./siegeZone3_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
            <button class="btnsiege" type="submit" name="envoyer" value=<?= $ligne['id'] ?> disabled>
                <img class="sieges" src="/ressources/img/siegedispo.svg" id="<?= $ligne['id'] ?>">
            </button>
        </form>
    </td>
<?php
}
?>