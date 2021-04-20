@extends('layout.app')

@section('content')

<table class="table table-success table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post )
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <hr>

                <button type="button" class="btn btn-danger delete-post" data-id="{{ $post->id }}">Delete</button>
            </td>
        </tr>

        @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-end p-3">
    @if ($posts->previousPageUrl())
    <a class="btn btn-primary" href="{{ $posts->previousPageUrl() }}">Next Posts </a>
    @endif

    <a class="btn btn-primary" href="{{ $posts->nextPageUrl() }}">Next Posts </a>
</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-post').click(function (e) {
            if (confirm('Are you sure ???')) {
                $.ajax({
                    url: '/posts/' + $(this).data('id'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    success: function(result){
                        location.reload();
                    }
                });
            }
        });
    })
</script>

@endsection
