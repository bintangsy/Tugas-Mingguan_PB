@extends('layouts.main')

@section('content')

    <!-- Konten Kontak (PHP) -->
    <div class="container mt-5">
      <h2 class="text-center mb-4">Kontak Kami</h2>

      <?php
        // Data kontak menggunakan array
        $kontak = [
          "Alamat"    => "Demak, Jawa Tengah",
          "WhatsApp"  => "+62 857 5582 7684",
          "Email"     => "adibpratama157@gmail.com",
          "Instagram" => "@addzzap_"
        ];
      ?>

      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered table-striped">
            <tbody>
              <?php
                // Loop isi kontak
                foreach ($kontak as $key => $value) {
                  echo "<tr>";
                  echo "<th style='width:30%'>$key</th>";
                  echo "<td>$value</td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <!-- Bisa tambahkan peta / deskripsi lain -->
          <h5>Peta Lokasi</h5>
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.489402932832!2d110.58000431477736!3d-7.068050494899092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ef57f7e3e5f3%3A0x123456789abcdef!2sDemak%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1695975600000!5m2!1sid!2sid" 
            width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>
    </div>

  </body>
</html>
   @endsection
