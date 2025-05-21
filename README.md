<h1>Pedoman</h1>

<h3>Sesuaikan define url pada file config.</h3>
Lokasi file config->app/config/config.php
Ubah baseurl(line 1) sesuai dengan tempat anda menyimpan folder web

contoh menyimpan folder web di folder tugas di dalam localhost maka baseurlnya menjadi :

    define('BASEURL', 'http://localhost/tugas/public');

<h3>biarkan public menjadi path terakhir</h3>

<ul>pasang composer 
<li>lalu install dependecies dengan menulis</li> 
<li>composer require ramsey/uuid</li>
</ul>

