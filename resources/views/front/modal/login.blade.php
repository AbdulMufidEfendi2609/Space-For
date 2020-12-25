<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('login')}}"  class="contactForm mb-0">
          
            <div id="result" class="contact-result"></div>
            <div>
                <label class="holder" for="name">Nama Pengguna/ Email</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div>
                <label class="holder" for="name">Password*</label>
                <input type="password" name="pass" class="form-control" required>
            </div>
            <div>
                <input type="submit" class="btn btn--primary btn--block mt-10"
                    value="Masuk">
            </div>
            <div class="form-notes">
                <span>Belum punya akun? <a href="#register" data-toggle="modal" data-target="#register">Daftar sekarang</a> </span>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="assets/php/contact.php" class="contactForm mb-0">
            <div id="result" class="contact-result"></div>
            <div>
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
            </div>
            <div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1" >
                    <option selected>Gender</option>
                    <option>Perempuan</option>
                    <option>Laki-laki</option>
                  </select>
                </div>
            </div>
            <div>
                <input type="number" name="no.hp" class="form-control" placeholder="No. Handphone" required>
            </div>
            <div>
                <input type="text" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="col">
                <input type="password" class="form-control" placeholder="Konfirmasi Password">
              </div>
            </div>
            <div>
                <div class="form-group" placeholder="Saya ingin...">
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option selected>Saya ingin...</option>
                    <option>Mengikuti Event</option>
                    <option>Menyelenggarakan Event</option>
                  </select>
                </div>
            </div>
            <div>
                <input type="text" name="organisasi" class="form-control" placeholder="Nama Organisasi" required>
            </div>
            <div>
                <input type="text" name="posisi" class="form-control" placeholder="Posisi di Organiasasi" required>
            </div>
            <div>
                <input type="submit" class="btn btn--danger" value="Masuk dengan Google+">
                <input type="submit" class="btn btn--secondary" value="Daftar">
            </div>
            <div class="form-notes">
                <span>Sudah punya akun? <a href="" data-toggle="modal" data-target="#login">Masuk sekarang</a> </span>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
