<!DOCTYPE html>
<html>
<head>
    <title>Visitor Details</title>
    <style>
        body { font-family: Arial; background:#f3f4f6; }
        .card {
            background:#fff;
            width:320px;
            margin:40px auto;
            padding:20px;
            border-radius:10px;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
        }
        h2 { text-align:center; }
        p { font-size:14px; margin:6px 0; }
        strong { color:#111; }
    </style>
</head>
<body>

<div class="card">
    <h2>Visitor Details</h2>
    <p><strong>Name:</strong> {{ $visitor->name }}</p>
    <p><strong>Mobile:</strong> {{ $visitor->mobile }}</p>
    <p><strong>Purpose:</strong> {{ $visitor->purpose }}</p>
    <p><strong>Person to Meet:</strong> {{ $visitor->person_to_meet }}</p>
    <p><strong>Department:</strong> {{ $visitor->department }}</p>
    <p><strong>Block:</strong> {{ $visitor->block }}</p>
    <p><strong>Floor:</strong> {{ $visitor->floor }}</p>
    <p><strong>Designation:</strong> {{ $visitor->designation }}</p>
</div>

</body>
</html>
