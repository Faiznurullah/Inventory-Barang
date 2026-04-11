<?php $assetBase = \App\Core\Config::baseAssetPath(); ?>
      </div>
    </div>

    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span><p class="mb-1">Copyright &copy; <a href="https://github.com/Faiznurullah" style="text-decoration: none;"><b>Faiz Nurullah</b></a></p></span><br>
        </div>
      </div>
    </footer>
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">Jika Keluar Anda Harus Login Terlebih Dahulu !</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="index.php?r=logout">Keluar</a>
      </div>
    </div>
  </div>
</div>

<script src="<?= $assetBase ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= $assetBase ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $assetBase ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= $assetBase ?>/js/sb-admin-2.min.js"></script>
</body>
</html>
