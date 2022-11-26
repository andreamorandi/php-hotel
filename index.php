<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
$parking = $_GET["parking"] ?? "";
$vote = $_GET["vote"] ?? "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <main>
        <section>
            <form action="index.php" method="get">
                <div>
                    <label for="parking">Filtra hotel con parcheggio</label>
                    <select name="parking" id="parking">
                        <option value="" <?php echo empty($parking) ? "selected" : ""; ?>>Tutti gli hotel</option>
                        <option value=true <?php echo $parking == true ? "selected" : ""; ?>>Hotel con parcheggio</option>
                    </select>
                </div>
                <div>
                    <label for="vote">Filtra hotel per voto</label>
                    <select name="vote" id="vote">
                        <option value="" <?php echo empty($vote) ? "selected" : ""; ?>>Tutti gli hotel</option>
                        <option value=2 <?php echo $vote == 2 ? "selected" : ""; ?>>2+</option>
                        <option value=3 <?php echo $vote == 3 ? "selected" : ""; ?>>3+</option>
                        <option value=4 <?php echo $vote == 4 ? "selected" : ""; ?>>4+</option>
                        <option value=5 <?php echo $vote == 5 ? "selected" : ""; ?>>5</option>
                    </select>
                </div>
                <button type="submit">Filtra</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php
                        foreach ($hotels[0] as $key => $value) {
                            echo "<th scope='col'>" . $key . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($hotels as $hotel) {
                        if (empty($parking) || $hotel["parking"] == $parking) {
                            if (empty($vote) || $hotel["vote"] >= $vote) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $count . "</th>";
                                foreach ($hotel as $key => $value) {
                                    echo "<td>" . $value . "</td>";
                                }
                                echo "</tr>";
                                $count++;
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>