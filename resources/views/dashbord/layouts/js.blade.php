    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('backend/assets') }}/js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/app.js"></script>

    <!-- toastr   -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>


    <!-- image upload time show   -->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>