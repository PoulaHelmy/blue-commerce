@if(session()->has('msg'))
    @section('custom-js')
        <script>
              Swal.fire({
                  title: 'Success!',
                  text:  '{{session('msg')}}.',
                  icon: 'success',
                  confirmButtonText: 'OK',
                  timer:2000
                })
            </script>
    @endsection
@endif

@if(session()->has('SUCCESS'))
    @section('custom-js')
        <script>
              Swal.fire({
                  title: 'Success!',
                  text:  '{{session('SUCCESS')}}.',
                  icon: 'success',
                  confirmButtonText: 'OK',
                  timer:2000
                })
            </script>
    @endsection
@endif

@if ($errors->any())
@section('custom-js')
    <script>
              Swal.fire({
                  title: 'Error!',
                  text:  'Invalid Form Credentials',
                  icon: 'error',
                  confirmButtonText: 'OK',
                  timer:2000
                })
            </script>
@endsection
@endif

@if(session()->has('ERROR'))
    @section('custom-js')
        <script>
                      title: 'Error!',
                      text:  '{{session('ERROR')}}',
                      icon: 'error',
                      confirmButtonText: 'OK',
                        timer:2000
                </script>
    @endsection
@endif