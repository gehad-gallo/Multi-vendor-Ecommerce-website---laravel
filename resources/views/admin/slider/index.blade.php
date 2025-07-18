@extends('admin.layouts.master')
@section('title', 'Sliders')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sliders</h1>
        </div>

        <div class="section-body">
            <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-header">
                      <h4>Sliders List</h4>
                      <div class="ml-auto">
                              <form action="{{route('admin.slider.create')}}">
                              <button class="btn btn-primary">+ Create New</button>
                              </form>
                      </div>
                    </div>


                    <div class="card-body">
                        {!! $dataTable->table(['class' => 'table table-bordered table-hover table-striped w-100'], true) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}

    <script>
      document.addEventListener('click', function (e) {
    if (e.target.closest('.delete-button')) {
        const button = e.target.closest('.delete-button');
        const id = button.getAttribute('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this slider!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
});

  </script>
  
@endpush



@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

