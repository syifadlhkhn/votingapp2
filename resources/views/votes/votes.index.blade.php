<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .candidate, .create-candidate {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafafa;
        }
        .candidate h2 {
            margin: 0 0 10px;
            color: #555;
        }
        .candidate p {
            margin: 0 0 10px;
            color: #666;
        }
        .candidate form {
            display: flex; /* Tambahkan style flex untuk button di kanan */
            justify-content: space-between; /* Jarakkan antara elemen */
            align-items: center; /* Posisikan vertikal tengah */
        }
        .candidate button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .candidate button:hover {
            background-color: #218838;
        }
        .create-candidate {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
        }
        .create-candidate label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        .create-candidate input, .create-candidate textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .create-candidate input[type="text"], .create-candidate textarea {
            box-sizing: border-box;
        }
        a {
            display: inline-block;
            margin: 20px 0;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Candidates</h1>
        <a href="{{ route('candidates.create') }}">Create New Candidate</a>
        
        @if($candidates->count() > 0)
            @foreach ($candidates as $candidate)
                <div class="candidate">
                    <h2>{{ $candidate->name }}</h2>
                    <p>{{ $candidate->description }}</p>
                    <form action="{{ route('votes.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                        <button type="submit">Vote</button>
                    </form>
                    <p>Number of Votes: {{ $candidate->vote_count }}</p> <!-- Menampilkan jumlah suara -->
                </div>
            @endforeach
        @else
            <p>No candidates found.</p>
        @endif

        <!-- Create Candidate Form -->
        <div class="create-candidate">
            <h1>Create Candidate</h1>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('candidates.store') }}" method="POST">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
