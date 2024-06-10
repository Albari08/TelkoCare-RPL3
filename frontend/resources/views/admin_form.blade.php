<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Input Form</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <label for="patient_name">Patient Name:</label>
            <input type="text" id="patient_name" name="patient_name" required>

            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
    