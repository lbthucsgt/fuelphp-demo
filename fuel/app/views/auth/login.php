<div class="login-wrapper mt-2 w-50">
    <h2>Login</h2>
    <form method="post" enctype="multipart/form-data" data-parsley-validate>
        <div class="form-group row">
            <label class="col-3">email</label>
            <div class="col-9">
                <input id="email" name="email" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">password</label>
            <div class="col-9">
                <input id="password" name="password" type="password" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3"></label>
            <div class="col-9 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/register">Register</a>
            </div>
        </div>
    </form>
</div>
