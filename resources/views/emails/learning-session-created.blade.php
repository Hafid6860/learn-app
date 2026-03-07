<x-mail::message>
# Halo {{ $studentName }},

Sesi pembelajaran baru telah ditambahkan ke jadwal Anda.

**Sesi:** {{ $sessionTitle }}  
**Tanggal:** {{ \Carbon\Carbon::parse($sessionDate)->locale('id')->translatedFormat('l, d F Y - H:i') }}  

Silakan klik tombol di bawah ini untuk melihat detail lengkap sesi belajar Anda:

<x-mail::button :url="$sessionUrl">
Lihat Detail Sesi
</x-mail::button>

Semangat belajar!<br>
Tim {{ config('app.name') }}
</x-mail::message>
