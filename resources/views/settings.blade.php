@extends('layouts.librenmsv1')


@section('content')
    <div style="margin-top:-12px; padding-bottom: 1em;">
        @includeIf('device-importer::layouts.flash-messages')
    </div>
    <div class="container-fluid">

        <div class="col-sm-12 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Menu Goes Here
                </div>
                <div class="panel-body">
                    Author Goes Here

                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="action" value="save">
                        <div class="form-group">
                            <label for="communities">SNMP Communities (Comma-Separated)</label>
                            <input type="text" class="form-control" id="communities" name="communities" value=""
                                placeholder="community1, community2, community3">
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            console.log("LibreNMS custom script running!");
            $(".alert").delay(5000).fadeOut(500, function() {
                $(this).alert('close');
            });
        });
    </script>
@endpush
