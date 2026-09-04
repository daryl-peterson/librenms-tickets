<div style="margin-top:-12px; padding-bottom: 1em;">

</div>
<div class="container-fluid">
    <div class="col-sm-12 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">

                Tickets
            </div>
            <div class="panel-body">


            </div>
        </div>
    </div>
</div>


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
