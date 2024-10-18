<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Workout</title>
</head>
<body>
    <h1>Create Workout</h1>
    <form action="/workouts/store" method="POST">
        @csrf
        <label for="name">Workout Name:</label>
        <input type="text" id="name" name="name" required><br>
        <button type="submit">Create Workout</button>
    </form>
</body>
</html>
