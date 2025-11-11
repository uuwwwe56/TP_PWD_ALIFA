<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    echo "Menampilkan Bilangan Genap <br>";
    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 == 0) {
            echo "$i ";
        }
    }
    ?>

    <br><br>
    <table border="1px solid">
        <tr>
            <th>Bilangan</th>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<th style='background-color:#00cc44'>$i</th>";
            }
            ?>
        </tr>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            echo "<th  style='background-color:#00cc44'>$i</th>";
            for ($j = 1; $j <= 10; $j++) {
                $hasil = $i * $j;
                if ($hasil%2==0) {
                    echo "<td class='diagonal'  style='background-color: cyan'>$hasil</td>";
                } else {
                    echo "<td  style='background-color:yellow'>$hasil</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>