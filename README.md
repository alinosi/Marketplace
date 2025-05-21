<h1>Pedoman</h1>

<h3>Sesuaikan define url pada file config.</h3>
<li>Lokasi file config->app/config/config.php</li>
<li>Ubah baseurl(line 1) sesuai dengan tempat anda menyimpan folder web</li>

contoh menyimpan folder web di folder tugas di dalam localhost maka baseurlnya menjadi :

    define('BASEURL', 'http://localhost/tugas/public');
biarkan public menjadi path terakhir

<h3>pasang composer</h3>
<li>lalu install dependecies dengan menulis</li> 
<li>composer require ramsey/uuid</li>
</ul>

