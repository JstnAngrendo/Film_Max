@extends('layouts.main')

@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Add Movie Button</title>
<style>
    .add-movie-button {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        border: 2px solid #3498db;
        color: #3498db;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .add-movie-button:hover {
        background-color: #3498db;
        color: #fff;
    }

    body {
    color: #ecf0f1; /* Change this to your desired text color */
}
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #34495e; /* Adjust border color for better contrast */
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #2c3e50; 
    }

    button {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        border: none;
        border-radius: 3px;
        transition: background-color 0.3s, color 0.3s;
        background-color: #3498db;
        color: #fff;
    }

    button:hover {
        background-color: #073452;
    }
</style>

</head>
<body>

  <a class="add-movie-button" href="/AdminForm">Add Movie</a>

  <div>
    <h2>Movies Table</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie['title'] }}</td>
                    <td>{{ $movie['release_date'] }}</td>
                    <td><Button>Update</Button></td>
                    {{-- @dump($movie) --}}
                    <td>
                        <form method="POST" action="/deleteMovie/{{ $movie['movieId'] }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

