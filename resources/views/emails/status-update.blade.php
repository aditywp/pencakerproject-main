<!DOCTYPE html>
<html>
<body>
    <h3>Hai,</h3>
    <p>Lamaran kamu untuk posisi <strong>{{ $vacancy->title }}</strong> telah diperbarui.</p>
    <p>Status sekarang: 
        <strong style="color:
            @if($status == 'accepted') green
            @elseif($status == 'rejected') red
            @else orange @endif">
            {{ ucfirst($status) }}
        </strong>
    </p>
    <p>Terima kasih sudah menggunakan platform AntiNganggur 🙌</p>
</body>
</html>
