@extends('layouts.apps')

@section('content')

<div class="container jumbo">
    <div class="row justify-content-center">
        <div class="col-8 info-post btn btn-primary">
            <div class="row">
                <div class="col-lg" style="font-family: gotham rounded; ">
                    <div div class="float-sm-center">
                        <h3 class="post">Bahan Doa</h3>
                        <p><b>1 Tesalonika 5:17-18</b></p>
                        <p><sup>5:17</sup> "Tetaplah berdoa.” <sup>5:18</sup> "Mengucap syukurlah dalam segala hal,
                         sebab itulah yang dikehendaki Allah di dalam Kristus Yesus bagi kamu.” </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bahan Doa Jemaat</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="comment-form" method="post" action="{{ route('comments.store') }}" >
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                        
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Tuliskan bahan doa disini..."></textarea>
                            </div>
                        
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" style="width: 100%" name="submit">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bahan Doa Jemaat</div>

                <div class="panel-body comment-container" >
                    
                    @foreach($comments as $comment)
                        <div class="well" style="text-align: justify;" >
                        <img src="{{asset('storage/'.$comment->user->jemaat->photo)}}" onerror="this.style.display='none'" class="rounded-circle float-left"/> 
                        <b> {{ $comment->name }} </b><br/>
                            <span style="font-size:14;"> {{ $comment->comment }} </span>
                            <p> {{ $comment->created_at }} </p>
                            <div style="font-size:12;">
                                <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" class="reply">Reply</a>&nbsp;
                                <a style="cursor: pointer;"  class="delete-comment" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" >Delete</a>
                                <div class="reply-form">
                                    
                                    <!-- Dynamic Reply form -->
                                    
                                </div>
                                @foreach($comment->replies as $rep)
                                     @if($comment->id === $rep->comment_id)
                                        <div class="well">
                                            
                                            <img src="{{asset('storage/'.$rep->user->jemaat->photo)}}" onerror="this.style.display='none'" class="rounded-circle float-left"/>
                                                <b> {{ $rep->name }} </b><br/>
                                                <span style="font-size:13;"> {{ $rep->reply }} </span>
                                                <br>
                                                <p style="font-size:10;" class="float-right"> {{ $comment->created_at }} </p>
                                                <br>
                                                <div style="font-size:11;" class="float-right">
                                                    <!-- <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>&nbsp; -->
                                                    <a style="cursor: pointer;" did="{{ $rep->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                                </div>
                                            
                                            <div class="reply-to-reply-form">
                                    
                                                <!-- Dynamic Reply form -->
                                                
                                            </div>
                                            
                                        </div>
                                    @endif 
                                @endforeach
                                
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

   

</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/comment.js') }}">
  
</script>


