<div class="register-wrapper mt-2 w-50">
    <h2>Register</h2>
    <form method="post" data-parsley-validate>
        <?= \Form::csrf(); ?>
        <div class="form-group row">
            <label class="col-3">Username</label>
            <div class="col-9">
                <input id="username" name="username" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Email</label>
            <div class="col-9">
                <input id="email" name="email" type="text" class="form-control" required data-parsley-type="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Password</label>
            <div class="col-9">
                <input id="password" name="password" type="password" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Confirm Password</label>
            <div class="col-9">
                <input id="confirm_passowrd" name="confirm_passowrd" type="password" class="form-control" required data-parsley-equalto="#password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3"></label>
            <div class="col-9">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
