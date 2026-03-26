<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Candidate</title>
</head>

<body>
    <h1>Candidate Management System</h1>
    <hr>
    <h2>Edit Candidate Information</h2>
    <form method="POST" action="/candidates/update/{{ $candidate->id }}">
        @csrf
        <label>First Name: </label>
        <input type="text" name="first_name" value="{{ $candidate->first_name }}" required><br><br>
        <label>Middle Name: </label>
        <input type="text" name="middle_name" value="{{ $candidate->middle_name }}"><br><br>
        <label>Last Name: </label>
        <input type="text" name="last_name" value="{{ $candidate->last_name }}" required><br><br>
        <label>Gender: </label><br>
        <input type="radio" name="gender" value="Male" {{ $candidate->gender === 'Male' ? 'checked' : '' }} required>Male<br>
        <input type="radio" name="gender" value="Female" {{ $candidate->gender === 'Female' ? 'checked' : '' }}>Female<br><br>
        <label>Address: </label>
        <input type="textarea" name="address" value="{{ $candidate->address }}" required><br><br>
        <label>Position: </label>
        <input type="text" name="position" value="{{ $candidate->position }}" required><br><br>
        <label>Party: </label>
        <input type="text" name="party" value="{{ $candidate->party }}" required><br><br>
        <button type="submit">Update</button><br><br>
    </form>
    <br><br>
    <a href="/candidates">Back to Candidate List</a>

</body>

</html>