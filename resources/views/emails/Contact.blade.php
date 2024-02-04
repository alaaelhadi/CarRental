<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
              body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50; 
            color: #374047;
            align-items: center;
            justify-content: center;
        }

        main {
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 24px;
        }

        small {
            font-size: 80%;
            display: block;
            margin-bottom: 10px;
            color: #7f8c8d;
        }

        p {
            margin: 10px 0;
            line-height: 1.6;
        }

        strong {
            color: #2c3e50;
        }

        /* Add some spacing and styling for better readability */
        h1,
        p {
            margin-bottom: 15px;
        }

        /* Style the small tag for a more subtle appearance */
        small {
            opacity: 0.7;
        }

        /* Add a border-bottom to separate sections */
        p:not(:last-child) {
            border-bottom: 1px solid #ecf0f1;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <main>
        <p>{!! nl2br(e($data['firstName'])) !!} {!! nl2br(e($data['lastName'])) !!}</p>
        <p>{!! nl2br(e($data['email'])) !!}</p>
        <p>{!! nl2br(e($data['message'])) !!}</p>
    </main>
</body>
</html>