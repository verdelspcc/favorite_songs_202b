<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>


<?php include 'template/header.php' ?>

<body>
    <p>Welcome <?php echo $_SESSION['fullName']; ?></p>
    <a href="logout.php">Logout</a>

    <h1>My Top Favorite Songs</h1>

    <a class="btn btn-green" href="create.php">Add new song</a>

    <form method="get" style="float: right">
        <input type="search" name="search" placeholder="Search anything..." />
        <button type="submit" name="btnSearch">Search</button>
    </form>

    <table border="1px" cellpadding="10">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Composer</th>
                <th>Album</th>
                <th>Released Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              include 'db_connection.php';

              if (isset($_GET['btnSearch'])) {
                  $sql = "SELECT * from songs WHERE 
                            title LIKE '%". $_GET['search'] ."%' OR
                            artist LIKE '%". $_GET['search'] ."%' OR
                            composer LIKE '%". $_GET['search'] ."%' OR
                            album LIKE '%". $_GET['search'] ."%' OR
                            released_date LIKE '%". $_GET['search'] ."%'
                          ";
              } else {
                  $sql = "SELECT * from songs";
              }
              
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['title'] . "</td>";
                      echo "<td>" . $row['artist'] . "</td>";
                      echo "<td>" . $row['composer'] . "</td>";
                      echo "<td>" . $row['album'] . "</td>";
                      echo "<td>" . $row['released_date'] . "</td>";
                      echo "<td>
                                <a href='view.php?id=" . $row['id']. "'>View Song</a>
                                <a href='edit.php?id=" . $row['id'] . "'>Edit Song</a>
                                <a href='delete.php?id=" . $row['id']  . "'>Delete Song</a>
                            </td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'>No results found!</td></tr>";
              }
            ?>
        </tbody>
    <table>
</body>

<?php include 'template/footer.php' ?>