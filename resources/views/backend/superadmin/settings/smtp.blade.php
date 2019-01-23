<div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ translate('SMTP_settings') }}</h4>
                    <form method="POST" class="col-12 stripeSmtpForm" action="{{ route('smtp.update') }}" id = "smtpsettings">
                        @csrf
                        @method('PATCH')
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="mail_driver"> {{ translate('mail_driver') }}</label>
                                <div class="col-md-9">
                                    <input type="hidden" name = "types[]" value="MAIL_DRIVER">
                                    <input type="text" id="mail_driver" name="MAIL_DRIVER" class="form-control"  value="{{ get_settings('mail_driver') }}" required>
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="mail_host">{{ translate('mail_host') }}</label>
                                <div class="col-md-9">
                                        <input type="hidden" name = "types[]" value="MAIL_HOST">
                                    <input type="text" id="mail_host" name="MAIL_HOST" class="form-control"  value="{{ get_settings('mail_host') }}" required>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="mail_port"> {{ translate('mail_port') }}</label>
                                <div class="col-md-9">
                                        <input type="hidden" name = "types[]" value="MAIL_PORT">
                                    <input type="text" id="mail_port" name="MAIL_PORT" class="form-control"  value="{{ get_settings('mail_port') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="mail_username"> {{ translate('mail_username') }}</label>
                                <div class="col-md-9">
                                        <input type="hidden" name = "types[]" value="MAIL_USERNAME">
                                    <input type="text" id="mail_username" name="MAIL_USERNAME" class="form-control"  value="{{ get_settings('mail_username') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="mail_password"> {{ translate('mail_password') }}</label>
                                <div class="col-md-9">
                                        <input type="hidden" name = "types[]" value="MAIL_PASSWORD">
                                    <input type="password" id="mail_password" name="MAIL_PASSWORD" class="form-control"  value="{{ get_settings('mail_password') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="mail_encryption"> {{ translate('mail_encryption') }}</label>
                                <div class="col-md-9">
                                        <input type="hidden" name = "types[]" value="MAIL_ENCRYPTION">
                                    <input type="text" id="mail_encryption" name="MAIL_ENCRYPTION" class="form-control"  value="{{ get_settings('mail_encryption') }}" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-8 col-lg-12 col-md-12 col-sm-12" onclick="updateSmtpInfo()">{{ translate('update_SMTP_settings') }}</button>
                            </div>
                        </div>
                    </form>
                        
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>