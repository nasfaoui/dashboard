@extends('admin.index')

@section('contentD')
    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session()->get('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mt-2">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="modal fade" id="ModalDU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ url('adminService/destroy') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>are you sure you want to delet this service ?</h6>
                        <input type="hidden" name="id" id="id">
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
    <h3 class="m-3">Services</h3>

    <div class="container">
        <table class="table" id="tabledata">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">location</th>
                    <th scope="col">price</th>
                    <th scope="col">user id</th>
                    <th scope="col">categorie name</th>
                    <th scope="col">rating</th>
                    <th scope="col">Date registered</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $item)
                    <tr class="table-active">
                        <td>{{ $item->id }}</td> 
                        <td>{{ $item->title }}</td>
                        <td> {{ $item->location }} </td>
                        <td> {{ $item->price }} </td>
                        <td> {{ $item->user->name }} </td>
                        <td> {{ $item->category_id }} </td>
                        <td>
                            <div class="service-rating">
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($item->averageRating()))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span>{{ number_format($item->averageRating(), 1) }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td class=" text-center ">
                            <button class="btn btn-danger btn-sm conferme m-1 " value="{{ $item->id }}">
                                <span><i class="align-middle " data-feather="trash"></i> </span>
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
                var idcat = $(this).val();
                $('#id').val(idcat);
                $('#ModalDU').modal('show');
            });
        });
    </script>
@endpush
