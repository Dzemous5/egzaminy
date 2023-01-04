<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="./styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section>
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
            if($conn){
                $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo from ryby
                inner join lowisko on lowisko.Ryby_id = ryby.id
                where lowisko.rodzaj = 3;";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0){
                    while ($row = mysqli_fetch_assoc($query)){
                        echo<<<END
                        <li>
                              $row[nazwa] pływa w rzece $row[akwen], $row[wojewodztwo]                    
                        </li>
                        END;
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </ol>
    </section>
    <figure>
        <img src="./ryba1.jpg" alt="Sum">
        <a href="./kwerendy.txt">Pobierz kwerendy</a>
    </figure>
    <main>
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <thead>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </thead>
            <!-- skrypt 2 here -->
            <?php
            $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
            if($conn){
                $sql = "select ryby.id, ryby.nazwa, ryby.wystepowanie from ryby where ryby.styl_zycia = 1;";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0){
                    while ($row = mysqli_fetch_assoc($query)){
                        echo<<<END
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[nazwa]</td>
                            <td>$row[wystepowanie]</td>
                        </tr>
                        END;
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </table>
    </main>
    
    <footer>
        <p>Stronę wykonał: 12345678911</p>
    </footer>
</body>
</html>
