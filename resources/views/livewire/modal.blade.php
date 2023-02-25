@foreach ($news as $new)
    <!-- news modal 1 start -->
    <div aria-hidden="true" class="news-modal modal fade" id="newsModal-{{$new->id}}" role="dialog" tabindex="-1">
        <!-- news modal content 1 start -->
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div><!-- container start -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- news modal body 1 start -->
                        <div class="modal-body">
                            <div class="modal-content-date">
                                {{ $new->created_at->format('M d ,Y, D h:i A') }}
                            </div>
                            <h2>
                                {{$new->title}}
                            </h2>
                            <p class="item-intro">
                                {{$new->category}}
                            </p><img alt="News Modal" class="img-responsive" @if ($new->image) src="{{ Storage::url($new->image->url) }}"
                            @else
                            src="img/news/news-1.jpg" @endif>
                            <p>
                                {{$new->description}}
                            </p><button class="c-btn" data-dismiss="modal" type="button"><span>Close</span></button>
                        </div><!-- news modal body 1 end -->
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- container end -->
        </div><!-- news modal content 1 end -->
    </div><!-- news modal 1 end -->
@endforeach
