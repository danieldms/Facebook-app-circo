<!-- Login Form -->
<form id="login-form" action="<?= $this->createUrl('admin/login') ?>" method="post" class="form-inline">
    <div class="control-group">
        <div class="input-append">
            <input type="text" name="login-email" id="login-email" placeholder="Email..">
            <span class="add-on"><i class="icon-envelope-alt"></i></span>
        </div>
    </div>
    <div class="control-group">
        <div class="input-append">
            <input type="password" name="login-password" id="login-password" placeholder="Password..">
            <span class="add-on"><i class="icon-asterisk"></i></span>
        </div>
    </div>
    <div class="control-group remove-margin clearfix">
        <div class="btn-group pull-right">
            <button type="submit" class="btn btn-small btn-success"><i class="icon-arrow-right"></i> Login</button>
        </div>
    </div>
</form>
<!-- END Login Form -->
