<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="assets/php/contact.php" class="contactForm mb-0">
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
                <span>Belum punya akun? <a href="{{ route('home') }}">Daftar</a> </span>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
