<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Visitor QR</title>
<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
<style>
    /* Reset & Body */
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body {
        background: #f3f4f6;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    /* Card */
    .qr-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        padding: 40px 30px;
        max-width: 380px;
        width: 100%;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .qr-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 32px rgba(0,0,0,0.18);
    }

    /* Heading */
    .qr-card h2 {
        font-size: 24px;
        color: #111827;
        margin-bottom: 25px;
    }

    /* QR Code Container */
    #qrcode {
        margin: 0 auto 20px auto;
        padding: 15px;
        background: #f9fafb;
        border-radius: 12px;
        display: inline-block;
    }

    /* Info Text */
    .info-text {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 20px;
    }

    /* Button */
    .btn {
        display: inline-block;
        padding: 12px 25px;
        border-radius: 8px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: #1d4ed8;
    }

    /* Responsive */
    @media(max-width: 400px){
        .qr-card {
            padding: 30px 20px;
        }
    }
</style>
</head>
<body>

<div class="qr-card">
    <h2>Visitor QR Code</h2>
    <div id="qrcode"></div>
    <p class="info-text">Scan this QR code with your phone to view visitor details securely.</p>
</div>

<script>
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: "{{ url('/scan/'.$visitor->id) }}",
        width: 200,
        height: 200,
    });
</script>

</body>
</html>
