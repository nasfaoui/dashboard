@extends('admin.index')

@section('contentD')
    @foreach ($categories as $categorie)
        <h1 class="text-black ms-3 fs-5 mb-3 ">Categorie : #{{ $categorie->id }}</h1>
        <form action="{{ Route('adminCategorie.update', $categorie->id) }}" method="POST"
            class="bg-white m-2  p-4 row rounded-4" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>


            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="col">
                
                <div class="mb-2">
                    <label for="parent" class="form-label">parent</label>
                    <select id="parent" name="parent" class="form-select">
                        <option value="">parent select</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> title</label>
                <input name="title" value="{{ $categorie->title }}" type="text" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">content</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $categorie->content }}</textarea>
            </div>

            <div class="card-footer mt-3">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i>
                    mise a jour</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                    Reset</button>
            </div>
        </form>
    @endforeach
@endsection
