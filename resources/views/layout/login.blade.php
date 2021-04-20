@extends('home')
@section('content')

            <div class="container">
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <form action="{{route('post.login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <select class="form-select" aria-label="Default select example" name="role" >
                        <option selected>Role</option>
                        <option value="1">admin</option>
                        <option value="2">user</option>

                    </select>
                    <br>

                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Login</button>

                    <div class="signup-link">
                        Not a member? <a href="#">Signup</a>
                    </div>
                    </form>
                </div>
                <div class="col-sm">

                </div>
            </div>
            </div>

@endsection

