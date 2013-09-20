<table style="border:1px solid #000">
    <tr style="border:1px solid #000">
        <th>Titlu Factura</th>
        <th>Suma Factura</th>
        <th>Numar Plati</th>
    </tr>

    <?php while ($rows = $facturi->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td style="border:1px solid #000"><?php echo $rows['title']; ?></td>
            <td style="border:1px solid #000"><?php echo $rows['suma']; ?></td>
            <td style="border:1px solid #000"><?php echo $rows['numar']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php for ($i = 1; $i <= $ultimaPagina; $i++) : ?>
    <a style="padding-left:5px;" href ="<?php echo $_SERVER['PHP_SELF'] ?>?paginaCurenta=<?php echo $i ?>"><?php echo $i ?></a>
<?php endfor ?>

<br />A durat <?php echo $time ?> secunde;