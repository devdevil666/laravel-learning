 @if(session()->has('flash_message'))
     <script>
         swal({
             title: "Success!",
             text: "{{ session('flash_message') }}",
             type: "success",
             timer: 3000,
             showConfirmationButton: false
         });
     </script>
 @endif