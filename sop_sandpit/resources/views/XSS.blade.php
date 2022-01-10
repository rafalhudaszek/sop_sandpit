@extends('layouts.default')

@section('content')

    <div class="col-7">
        <div class="row">
            <div class="col">
                <h3 class="main-h">Cross Site Scripting</h3>
                <p  class="default-paragraph mb-4">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Utwórz post</h3>
                <form class="button-wrapper" name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('XSS')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" id="title" name="title" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col validation">
                <h3>Pokaż liste postów:</h3>
                <a href="{{url('XSS/posts-with-special-chars')}}">z walidacją znaków specialnych>></a><br>
                <a href="{{url('XSS/posts-without-special-chars')}}">bez walidacji znaków specialnych>></a>
                @yield('XSS-content')
            </div>
        </div>
    </div>

@endsection
