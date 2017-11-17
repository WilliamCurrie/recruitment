<div>
    <h3>Surnames</h3>
    <?php
    foreach ($data as $row) {
        echo formatNames($row['first_name'], $row['second_name']);
    }
?>
</div>
