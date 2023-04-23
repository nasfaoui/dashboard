@extends('admin.index')

@section('contentD')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

    <h2 class="">
Modifier :{{$user->id}}
</h2>

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


            <form class=" container mt-3 bg-white rounded-3 p-4" action="{{route('adminUsers.update',$user->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')
              <label class="mb-2 form-label" for="">Email</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="align-middle " data-feather="mail"></i></span>
                <input value="{{$user->email}}" name="email" type="email" class="form-control" placeholder="exempl@exempl.com" aria-label="email" aria-describedby="basic-addon1">
              </div>

              <label class="mb-2 form-label" for="">first name</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="align-middle " data-feather="user"></i></span>
                <input value="{{$user->name}}"  name="name" type="text" class="form-control" placeholder="exempl@exempl.com" aria-label="email" aria-describedby="basic-addon1">
              </div>

              <label class="mb-2 form-label" for="">Last name</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="align-middle " data-feather="user"></i></span>
                <input value="{{$user->lastName}}" name="lastName" type="text" class="form-control" placeholder="exempl@exempl.com" aria-label="email" aria-describedby="basic-addon1">
              </div>

              <label class="mb-2 form-label" for="">telephone</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="align-middle " data-feather="phone"></i></span>
                <input value="{{$user->telephone}}" name="telephone" type="text" class="form-control" placeholder="exempl@exempl.com" aria-label="email" aria-describedby="basic-addon1">
              </div>

              <img src="{{$user->image}}" class=" m-3 form-input" style="height: 6rem; width: 7rem;" alt="">
              <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input  class="form-control border" name="image" type="file" id="image">
            </div>
              
              <div class="form-floating mb-4">
                <textarea name="bio" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">{{$user->bio}}</textarea>
                <label for="floatingTextarea">Bio</label>
              </div>
              
              <div class=" mb-5 row" style="width: 200px">
                <label for="inputState" class="form-label">Role</label>
                <div class="form-check col">
                  <input name="isArtisan" value="1" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                  @if ($user->isArtisan)
                      @checked(true)
                  @endif
                  >
                  <label class="form-check-label" for="flexRadioDefault2">
                    artisan
                  </label>
                </div>
                <div class="form-check col">
                  <input name="isArtisan" value="0" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                  @if ($user->isAdmin==false && $user->isArtisan==false)
                      @checked(true)
                  @endif
                  >
                  <label class="form-check-label" for="flexRadioDefault3">
                    client
                  </label>
                </div>
              </div>

              <div class="mb-3  row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input value="{{$user->password}}" type="text" class="form-control" id="inputPassword">
                </div>
              </div>

              <div class="col-12  ">
                <button type="submit" class="btn btn-success mt-4">Update</button>
              </div>
            </form>

@endsection
