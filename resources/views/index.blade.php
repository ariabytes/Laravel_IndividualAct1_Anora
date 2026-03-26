<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Management System</title>
</head>

<body>
    <h1>Candidate Management System</h1>
    <hr>
    <h2>Add a Candidate</h2>
    <form method="POST" action="/candidates/store">
        @csrf
        <label>First Name: </label>
        <input type="text" name="first_name" required><br><br>
        <label>Middle Name: </label>
        <input type="text" name="middle_name"><br><br>
        <label>Last Name: </label>
        <input type="text" name="last_name" required><br><br>
        <label>Gender: </label><br>
        <input type="radio" name="gender" value="Male" required>Male<br>
        <input type="radio" name="gender" value="Female">Female<br><br>
        <label>Address: </label>
        <input type="textarea" name="address" required><br><br>
        <label>Position: </label>
        <input type="text" name="position" required><br><br>
        <label>Party: </label>
        <input type="text" name="party" required><br><br>
        <button type="submit">Save</button><br><br>
    </form>

    <hr>
    <h2>Candidate List</h2>
    <form method="GET" action="/candidates">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by name, position, or party">
        <button type="submit">Search</button> |
        <button><a href="/candidates">Clear</a></button>
    </form>
    <br>
    <!-- 'first_name', 'middle_name', 'last_name', 'gender', 'address', 'position', 'party' -->
    <table border="1" cellpadding="10">
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Position</th>
            <th>Party</th>
            <th>Action</th>
        </tr>
        @foreach($candidates as $candidate)
        <tr>
            <td>{{ $candidate->first_name }}</td>
            <td>{{ $candidate->middle_name }}</td>
            <td>{{ $candidate->last_name }}</td>
            <td>{{ $candidate->gender }}</td>
            <td>{{ $candidate->address }}</td>
            <td>{{ $candidate->position }}</td>
            <td>{{ $candidate->party }}</td>
            <td>
                <a href="/candidates/edit/{{ $candidate->id }}">Edit</a>
                |
                <a href="/candidates/delete/{{ $candidate->id }}" onclick="return confirm('Are you sure you want to delete this candidate?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>


</body>

</html>