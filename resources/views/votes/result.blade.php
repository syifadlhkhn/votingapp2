<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
</head>
<body>
    <h1>Voting Results</h1>
    @foreach ($candidates as $candidate)
        <div>
            <h2>{{ $candidate->name }}</h2>
            <p>{{ $candidate->votes_count }} votes</p>
        </div>
    @endforeach
</body>
</html>

