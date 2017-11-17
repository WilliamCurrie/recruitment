<table>
    <?php
    if (!empty($data)) {
        foreach ($data as $row) {
            ?>
            <tr>
                <td><?= $row['first_name'] ?></td>
                <td><?= $row['second_name'] ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>