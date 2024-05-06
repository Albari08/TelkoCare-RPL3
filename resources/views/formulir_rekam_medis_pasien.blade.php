<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
    <div>
        <form method="POST" action="/patients">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="age">Age:</label><br>
            <input type="text" id="age" name="age"><br>
            <label for="patient_number">Patient Number:</label><br>
            <input type="text" id="patient_number" name="patient_number"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>