@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h1>Create post</h1>

                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group has-error">
                        <label for="slug">Slug <span class="require">*</span> <small>(This field use in url path.)</small></label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug', '')}}">
                        <span class="help-block">Field not entered!</span>
                    </div>

                    @error('slug')
                     <div class="arlet alert-danger" >{{$message}}</div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="title">Title <span class="require">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{old('title', '')}}">
                    </div>

                    @error('title')
                     <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="description">Content</label>
                        <textarea rows="5" class="form-control" name="content" value="{{old('content', '')}}"></textarea>
                    </div>

                    @error('content')
                     <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="title">User_id <span class="require">*</span></label>
                        <input type="text" class="form-control" name="user_id" value="{{old('user_id', '')}}">
                    </div>

                    @error('user_id')
                     <div class="arlet alert-danger">{{$message}}</div>
                     @enderror

                    <br>
                    <div class="form-group">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" multiple name="name[]" >
                            <option selected>Categories-Name</option>
                            @foreach ($category as $cate )
                                <option value="{{ $cate->id }}"> {{ $cate->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- @error('name[]')
                     <div class="arlet alert-danger">{{$message}}</div>
                    @enderror -->

                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
