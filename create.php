<?php include 'template/header.php' ?>

<body>
    <h1>Create new song</h1>
    <form method="POST" action="save.php">
        <div>
            <label>Enter song title</label>
            <input type="text" name="title" />
        </div>
        <div>
            <label>Enter song artist</label>
            <input type="text" name="artist" />
        </div>
        <div>
            <label>Enter song composer</label>
            <input type="text" name="composer" />
        </div>
        <div>
            <label>Enter song album</label>
            <input type="text" name="album" />
        </div>
        <div>
            <label>Enter song released date</label>
            <input type="text" name="released_date" />
        </div>
        <div>
            <button class="btn btn-green" type="submit" name="submit">Create song</button>
        </div>
    </form>
</body>


<?php include 'template/footer.php' ?>