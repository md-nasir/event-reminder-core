<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $reminderData['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<p><strong>Dear Concern,</strong></p>
<p>{{ $reminderData['content'] }}</p>
</body>
</html>
