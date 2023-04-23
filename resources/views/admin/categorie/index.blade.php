@extends('admin.index')

@section('contentD')
    <a class="btn btn-outline-info " href="{{ route('adminCategorie.create') }}">
        <span><i class="align-middle me-2" data-feather="plus"></i> Ajouter une categorie</span> 
    </a>


    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session()->get('message') }}
        </div>
    @endif
    @if (session()->has('messaged'))
    <div class="alert alert-danger mt-2">
        {{ session()->get('messaged') }}
    </div>
@endif
    <div class="modal fade" id="ModalDU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ url('dashboard/categorie/delete') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>are you sure you want to delet this categorie ?</h6>
                        <input type="hidden" name="id_cat" id="id_cat">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- ///////////////////////////////////// --}}
    <h3 class="m-3">Categories</h3>

    <div class="container">
        <table class="table" id="tabledata">
            <thead class="table-dark">
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                    <th scope="col">parent</th>
                    <th scope="col">Date registered</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorie as $item)
                    <tr class="table-active">
                        
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            {{ $item->parent ? $item->parents->title : 'main category' }}
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td class=" text-center">
                            <button class="btn btn-danger btn-sm conferme " value="{{ $item->id }}">
                                <span><i class="align-middle " data-feather="trash"></i> delete </span>
                            </button>
                            <a class="btn btn-info btn-sm " href="{{ route('adminCategorie.edit', $item->id) }}">
                                <span><i class="align-middle " data-feather="edit-2"></i> edit</span></a>
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
                var idcat = $(this).val();
                $('#id_cat').val(idcat);
                $('#ModalDU').modal('show');
            });
        });
    </script>
@endpush
