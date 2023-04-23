@extends('admin.index')

@section('contentD')
    <h2 class="">
        Users
    </h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    <div class="modal fade" id="ModalDU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ url('adminUsers/destroy') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>are you sure you want to delet this user ?</h6>
                        <input type="hidden" name="id_user" id="id_user">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- /////////////////////////////////////////// --}}

    <div class="container">
        <table class="table" id="tabledata">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>service_id</th>
                    <th>user_id</th>
                    <th >status</th>
                    <th >Date</th>
                    <th >action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($commands as $item)
                    <tr class="table-active">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->service_id }}</td>
                        <td>{{ $item->user_id }}</td>
                        <td>
                                @if ($item->status === 'en cour')
                                <span class="badge bg-warning text-dark">en cour</span>
                                @else
                                <span class="badge bg-success">terminer</span>
                                @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td class=" text-center">
                            <button class="btn btn-danger btn-sm conferme " value="{{ $item->id }}">
                                <span> <i class="align-middle " data-feather="trash"></i> Supprimer </span>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $('#tabledata').DataTable();
        });


        $(document).ready(function() {
            $('.conferme').click(function(e) {
                e.preventDefault();
                var iduser = $(this).val();
                $('#id_user').val(iduser);
                $('#ModalDU').modal('show');
            });
        });
    </script>
@endpush
