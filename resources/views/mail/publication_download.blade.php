<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Download Your Publication</title>
</head>
<body>
    <h2>Thank you for your interest!</h2>
    
    <p>Dear {{ $name }},</p>
    
    <p>Thank you for downloading our publication: <strong>{{ $publicationTitle }}</strong></p>
    
    @if($pdfUrl)
    <p>You can download the publication using the link below:</p>
    <p>
        <a href="{{ $pdfUrl }}" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Download Publication
        </a>
    </p>
    @else
    <p>We will send you the download link shortly once it's available.</p>
    @endif
    
    <p>Best regards,<br>ValueXPA Team</p>
</body>
</html>