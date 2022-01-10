@extends('XSS')
@section('XSS-content')
    <div id="posts">
        <table>
            <th>Title</th>
            <th>Description</th>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                </tr>
            <br>
            @endforeach
        </table>
    </div>
@endsection
