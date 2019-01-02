<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">System Settings</h4>
                <form method="POST" class="col-12 ajaxForm" action="{{ route('system.update') }}" id = "system_settings">
                    @csrf
                    @method('PATCH')
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name"> System Name</label>
                            <div class="col-md-9">
                                <input type="text" id="system_name" name="system_name" class="form-control"  value="{{ get_settings('system_name') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_email"> System Email</label>
                            <div class="col-md-9">
                                <input type="email" id="system_email" name="system_email" class="form-control"  value="{{ get_settings('system_email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" class="form-control"  value="{{ get_settings('phone') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address"> Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="address" name = "address" rows="5" required>{{ get_settings('address') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="purchase_code"> Purchase Code</label>
                            <div class="col-md-9">
                                <input type="text" id="purchase_code" name="purchase_code" class="form-control"  value="{{ get_settings('purchase_code') }}" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12" onclick="some()">Update System Settings</button>
                        </div>
                    </div>
                </form>
                    
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Input Types</h4>                    
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>