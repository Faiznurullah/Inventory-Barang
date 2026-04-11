<?php if (!empty($flash_success)): ?>
  <div class="col-md-10 col-sm-12 col-xs-12 ml-5">
    <div class="alert alert-primary mt-4 ml-5" role="alert"><p><center><?= htmlspecialchars((string) $flash_success) ?></center></p></div>
  </div>
<?php endif; ?>
<?php if (!empty($flash_warning)): ?>
  <div class="col-md-10 col-sm-12 col-xs-12 ml-5">
    <div class="alert alert-warning mt-4 ml-5" role="alert"><p><center><?= htmlspecialchars((string) $flash_warning) ?></center></p></div>
  </div>
<?php endif; ?>
<?php if (!empty($flash_error)): ?>
  <div class="col-md-10 col-sm-12 col-xs-12 ml-5">
    <div class="alert alert-danger mt-4 ml-5" role="alert"><p><center><?= htmlspecialchars((string) $flash_error) ?></center></p></div>
  </div>
<?php endif; ?>
