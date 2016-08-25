@extends('layouts.maste')
@section('title')Dashbord @endsection
@section('content')
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Wha do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-group" id="body" name="body" rows="5" placeholder="Your Post"> </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
                <article class="post">
                    <p>
                        {{$post->body}}
                    </p>
                    <div class="info">
                        Post by {{$post->user->first_name}} on {{$post->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a>
                        <a href="#">Dislike</a>
                        @if(Auth::user()== $post->user)
                        <a class="edit" href="#" data-toggle="modal" data-target="#myModal" >Edit</a>
                        <a href="{{ route('post.delete',['post_id'=> $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Poste</h4>
                </div>
                <div class="modal-body">
                   <div class="form-group">
                       <label for="post-body">Edit the post</label>
                       <textarea class="form-control" name="post-body" id="post-body" row="5"></textarea>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection