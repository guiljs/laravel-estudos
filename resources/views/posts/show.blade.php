@extends('layout.blog-master')

@section('content')

    <div class="col-sm-8 blog-main">
        
        <h1>{{ $post->title }}</h1>

        {{ $post->body }}

        <hr>
        
        <div class="comment">

            <h4>Comentários</h4>

            <ul class="list-group">
        
                @foreach ($post->comments as $comment)
                
                    <li class="list-group-item">

                        <strong>
                            {{-- {{ $comment->created_at->toFormattedDateString() }} --}}
                            {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        </strong>

                        {{ $comment->body }}

                    </li>      
                    
                @endforeach
                
            </ul>

            <!-- Add a comment -->
            <hr>

            <div class="card">
                <div class="card-body">

                    @include('layout.errors')

                    <form method="POST" action="/posts/{{ $post->id }}/comments">
                            
                        {{ csrf_field() }}

                        {{ method_field('PATCH') }}  <!-- Some processers already undertand PATCH -->

                        <div class="form-group">
                            <textarea name="body" id="" placeholder="Seu comentário aqui"  class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add a comment</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

