<!DOCTYPE html>
<html>
<head>
    <title>Status Pengajuan Anda Telah Diubah</title>
</head>
<body>
    <h1>Hallo, {{ $submission->user->name }}!</h1>
    <p>Status pengajuan Anda telah diubah menjadi: <strong>{{ $status }}</strong></p>

    <p>Detail Pengajuan:</p>
    <ul>
        <li>ID Pengajuan: {{ $submission->id }}</li>
        <li>Judul: {{ $submission->title }}</li>
        <li>Tanggal Pengajuan: {{ $submission->created_at }}</li>
    </ul>

    <p>Terima kasih telah menggunakan layanan kami.</p>
</body>
</html>
