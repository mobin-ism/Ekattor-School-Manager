<form method="POST" action="{{ route('install') }}">
    @csrf
    <div class="form-group">
        <label for="db_host">Database Host</label>
        <input type="text" class="form-control" id="db_host" name = "DB_HOST">
        <input type="hidden" name = "types[]" value="DB_HOST">
    </div>
    <div class="form-group">
        <label for="db_name">Database Name</label>
        <input type="text" class="form-control" id="db_name" name = "DB_DATABASE">
        <input type="hidden" name = "types[]" value="DB_DATABASE">
    </div>
    <div class="form-group">
        <label for="db_user">Username</label>
        <input type="text" class="form-control" id="db_user" name = "DB_USERNAME">
        <input type="hidden" name = "types[]" value="DB_USERNAME">
    </div>
    <div class="form-group">
        <label for="db_pass">Password</label>
        <input type="password" class="form-control" id="db_pass" name = "DB_PASSWORD">
        <input type="hidden" name = "types[]" value="DB_PASSWORD">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>