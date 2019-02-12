    <aside class="sidebar">
            <div class="side">
            <form role="search" method="get" action="{{route('search')}}">
              <div class="form-group">
                <input type="text" name="s" class="form-control" id="search" placeholder="Keywords">
                <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
              </div>
            </form>
            </div>
            <div class="side-wrap">
              <h2 class="sidebar-heading">About Me</h2>
              <div class="author-img" style="background-image: url(/images/author.jpg);"></div>
              <p>Hi! My Name is <strong>Tanbir</strong> I am a Running B.sc in CSE Student, open source enthusiast, fast learner, early adopter, self motivated. You can see my <a href="{{route('about')}}">portfolio to</a> know more aboute me.</p>
              <p>
                <ul class="colorlib-social-icons">
                  <li><a href="https://www.facebook.com/tanbir.me"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/tanbir_me"><i class="icon-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/im-tanbir/"><i class="icon-linkedin"></i></a></li>
                    <li><a href="https://github.com/totanbir"><i class="icon-github"></i></a></li>
                </ul>
              </p>
            </div>
            <div class="side-wrap">
              <h2 class="sidebar-heading">Recent Post</h2>
              @foreach($SiteData['blog'] as $blog)
              <div class="f-entry">
                <a href="{{ route('singlepost', ['id' => $blog->id,'slug' => $blog->slug]) }}" class="featured-img" style="background-image: url(/images/{{$blog->image}});"></a>
                <div class="desc">
                  <span><i class="icon-calendar3"></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('Y-m-d')}}</span>
                  <h3><a href="{{ route('singlepost', ['id' => $blog->id,'slug' => $blog->slug]) }}">{{$blog->title}}</a></h3>
                </div>
              </div>
              @endforeach
            </div>
            <div class="side-wrap">
              <h2 class="sidebar-heading">Categories</h2>
              <ul class="category">
                @foreach($SiteData['category'] as $cat)
                <li><a href="{{ route('categorypost', ['category' => $cat->name]) }}"><i class="icon-radio-checked"></i>{{$cat->name}}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="side-wrap">
              <h2 class="sidebar-heading">Popular Post</h2>
              @foreach($SiteData['popular'] as $popular)
              <div class="f-entry">
                <a href="{{ route('singlepost', ['id' => $popular->id,'slug' => $popular->slug]) }}" class="featured-img" style="background-image: url(/images/{{$popular->image}});"></a>
                <div class="desc">
                  <span><i class="icon-calendar3"></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $popular->created_at)->format('Y-m-d')}}</span>
                  <h3><a href="{{ route('singlepost', ['id' => $popular->id,'slug' => $popular->slug]) }}">{{$popular->title}}</a></h3>
                </div>
              </div>
              @endforeach
            </div>
            <div class="side-wrap">
              <h2 class="sidebar-heading">Video Post</h2>
              <div class="video colorlib-video" style="background-image: url(/images/blog-1.jpg);">
                <a href="https://vimeo.com/79305568" class="popup-vimeo"><i class="icon-play"></i></a>
                <div class="overlay"></div>
              </div>
            </div>
            <div class="side-wrap">
              <h2 class="sidebar-heading">Tags</h2>
              <p class="tags">
              @foreach($SiteData['tag'] as $tag)
                <span><a href="{{ route('tagpost', ['tag' => $tag->name]) }}">{{$tag->name}}</a></span>
              @endforeach
              </p>
            </div>

            <div class="side">
              <h2 class="sidebar-heading">Get New Post Update</h2>
                        @if (Session::has('success'))

          <div class="alert alert-success" role="alert">
          <strong>Success:</strong> {{ Session::get('success') }}
          </div>

          @endif

          @if (count($errors) > 0)

          <div class="alert alert-danger" role="alert">
          <strong>Errors:</strong>
          <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach  
          </ul>
          </div>

          @endif
              <div class="row">
                <div class="col-md-12 col-md-offset-0">
                <form action="{{route('subscribe')}}" method="post">
                @csrf
                  <div class="form-group">
                    <input type="text" name="email" class="form-control form-email text-center" id="email" placeholder="name@example.com">
                    <button type="submit" class="btn btn-primary btn-subscribe"><i class="icon-compass2"></i> Subscribe</button>
                  </div>
                </form>
                </div>
                <p>
                  <ul class="colorlib-social-icons text-center">
                    <li><a href="https://www.facebook.com/tanbir.me"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/tanbir_me"><i class="icon-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/im-tanbir/"><i class="icon-linkedin"></i></a></li>
                    <li><a href="https://github.com/totanbir"><i class="icon-github"></i></a></li>
                  </ul>
                </p>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>