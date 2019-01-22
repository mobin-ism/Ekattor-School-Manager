@php
    $languages = \App\Language::where('school_id', school_id())->get();
@endphp

@if (count($languages) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('name') }}</th>
                    <th>Code</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $languages as $language)
                    <tr>
                        <td> {{ $language->name }} </td>
                        <td> {{ $language->code }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('language.phrase', $language->id) }}', 'Update Phrases For {{ $language->name }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Phrases"> <i class="mdi mdi-update"></i> </button>
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('language.edit', $language->id) }}', 'Update Language')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Language info"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm"      style="margin-right:5px;" onclick="confirm_modal('{{ route('language.destroy', $language->id) }}', showAllLanguages )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Language"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('language.create') }}', 'Add New Parent')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

