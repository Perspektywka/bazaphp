<form method="post">
    <button type="submit" name="dane" value="pokaz">Wyświetl dane</button>
</form>

<?php
if ($_POST["dane"] == "pokaz") {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "moja_baza";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM uczniowie";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - imie: " . $row["imie"] . " - nazwisko: " . $row["nazwisko"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>