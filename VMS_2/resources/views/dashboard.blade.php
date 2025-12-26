<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Visitor Management System</title>

<link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
<style>
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    background: #eef2f7;
}

/* HEADER */
.header {
    background: #111827;
    color: #fff;
    padding: 18px 40px;

    display: flex;
    justify-content: center; 
    align-items: center;     
}

.header h1 {
    margin: 0;
    font-size: 22px;
}

/* CONTENT */
.content {
    padding: 40px;
    display: flex;
    justify-content: center;
}

/* FORM CARD */
.form-wrapper {
    width: 100%;
    max-width: 1000px;
    background: #fff;
    padding: 35px 40px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.form-wrapper h2 {
    text-align: center;
    margin-bottom: 30px;
}

/* GRID FORM */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 6px;
    font-size: 14px;
}

input, textarea, select {
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

textarea {
    resize: vertical;
    min-height: 80px;
}

/* FULL WIDTH */
.full {
    grid-column: span 2;
}

/* CAMERA */
.camera-box {
    background: #f9fafb;
    border: 1px dashed #ccc;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
}

.camera-box video,
.camera-box img {
    border-radius: 6px;
    margin-top: 10px;
}

/* BUTTONS */
.btn {
    padding: 12px 20px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 15px;
}

.btn-dark {
    background: #111827;
    color: #fff;
}

.btn-dark:hover {
    background: #1f2937;
}

.btn-outline {
    background: #fff;
    border: 1px solid #111827;
    color: #111827;
    margin-right: 10px;
}

.btn-outline:hover {
    background: #111827;
    color: #fff;
}

/* SUCCESS */
.success {
    background: #d1fae5;
    color: #065f46;
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 20px;
    text-align: center;
}

/* MOBILE */
@media(max-width:768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    .full {
        grid-column: span 1;
    }
    .content {
        padding: 20px;
    }
}
</style>
</head>

<body>

<div class="header">
    <h1>Visitor Management System</h1>
</div>

<div class="content">
<div class="form-wrapper">

<h2>Visitor Entry Form</h2>

@if(session('success'))
<div class="success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('visitor.store') }}">
    @csrf

    <div class="form-grid">

    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Mobile Number</label>
        <input type="text" name="mobile" required>
    </div>

    <div class="form-group">
        <label>Purpose of Visit</label>
        <input type="text" name="purpose" required>
    </div>

    <div class="form-group">
        <label>Person to Meet</label>
        <input type="text" name="person_to_meet" required>
    </div>

    <div class="form-group">
        <label>ID Proof Type</label>
        <select name="id_proof_type" required>
            <option value="">Select</option>
            <option value="Aadhar">Aadhar</option>
            <option value="PAN">PAN</option>
            <option value="Driving License">Driving License</option>
            <option value="Passport">Passport</option>
        </select>
    </div>

    <div class="form-group">
        <label>ID Proof Number</label>
        <input type="text" name="id_proof_number" required>
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" class="form-control" min="1" max="120" required>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select name="gender" class="form-control" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="form-group">
        <label>Department</label>
        <input type="text" name="department" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Block</label>
        <input type="text" name="block" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Floor</label>
        <input type="text" name="floor" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Designation</label>
        <input type="text" name="designation" class="form-control" required>
    </div>

    <!-- CAMERA -->
    <div class="form-group full">
        <label>Visitor Photo</label>
        <div class="camera-box">
            <video id="video" width="300" height="220" autoplay></video>
            <canvas id="canvas" width="300" height="220" style="display:none;"></canvas>

            <br><br>
            <button type="button" class="btn btn-outline" onclick="startCamera()">Start Camera</button>
            <button type="button" class="btn btn-outline" onclick="capturePhoto()">Capture</button>

            <br>
            <img id="photoPreview" style="display:none; max-width:220px;">
            <input type="hidden" name="photo" id="photoInput">
        </div>
    </div>

    <div class="form-group full">
        <button type="submit" class="btn btn-dark">Save Visitor</button>
    </div>

    </div>
</form>

</div>
</div>

<script>
let video = document.getElementById('video');
let canvas = document.getElementById('canvas');
let photoInput = document.getElementById('photoInput');
let preview = document.getElementById('photoPreview');

function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => video.srcObject = stream)
        .catch(() => alert("Camera permission denied"));
}

function capturePhoto() {
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
    let imgData = canvas.toDataURL('image/png');
    photoInput.value = imgData;
    preview.src = imgData;
    preview.style.display = 'block';
}
</script>

</body>
</html>
