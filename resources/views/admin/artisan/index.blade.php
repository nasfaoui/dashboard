@extends('admin.index')

@section('contentD')
    <h2 class="">
        Artisans
    </h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    <div class="modal fade" id="ModalDU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ url('adminArtisan/destroy') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete artisan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>are you sure you want to delet this artisan ?</h6>
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

    <div class="container w-full">
        <table class="table" id="tabledata">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th scope="col">Date registered</th>
                    <th scope="col">telephone</th>
                    <th scope="col">email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($artisans as $item)
                    <tr class="table-active">
                        <th >{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->lastName }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->telephone }}</td>
                        <td>{{ $item->email }}</td>
                        <td class=" text-center">
                            <button class="btn btn-danger btn-sm conferme " value="{{ $item->id }}">
                                <span><i class="align-middle " data-feather="trash"></i> delete </span>
                            </button>
                            <a class="btn btn-info btn-sm " href="{{ route('adminArtisan.edit', $item->id) }}">
                                <span><i class="align-middle " data-feather="edit-2"></i> edit </span></a>

                            <a class="btn btn-info btn-sm m-1 " href="{{ route('adminArtisan.show', $item->id) }}">
                            <span><i class="align-middle " data-feather="server"></i> Services </span></a>
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
