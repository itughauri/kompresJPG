  @foreach($blogs as $key=>$blog)
                <div class="col-lg-3">
                    <a href="{{route('blog.details',$blog->blog_url)}}">
                        <div class="recent-blog ">
                        <img class="img-fluid" src="{{route('image.get',$blog->main_img)}}" width="696" height="418" alt="{{$blog->image_alt}}">
                        <div class="blog-dis p-3">
                            <h3 class="blog-hd">{{stripslashes($blog->title)}} </h3>
                            <p class="blog-text">{!! implode(' ', array_slice(explode(' ', stripslashes(strip_tags( $blog->meta_description))), 0, 45))!!}...</p>
                            <div class="text-center">
                                <a class="btn  read-more myb" href="{{route('blog.details',$blog->blog_url)}}">Read More <span><!-- <img src="assets/images/Icon/arrow.svg" alt=""> --></span></a>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
