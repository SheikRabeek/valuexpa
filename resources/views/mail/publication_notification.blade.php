<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Publication Download</title>
</head>
<body>
    <h2>New Publication Download</h2>
    
    <p><strong>Publication:</strong> {{ $publicationTitle }}</p>
    <p><strong>User:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Date:</strong> {{ now()->format('Y-m-d H:i:s') }}</p>
</body>
</html>