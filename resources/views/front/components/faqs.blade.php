
    <div class="all-faqs">
        @if(isset($faqs))
            @foreach($faqs as $faq)
                <div class="faqs">
                    <div class="faq" data-number="one" data-list="{{$faq->title}}">
                        <p>{{$faq->title}}</p>
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </div>
                    <div class="answer" data-number="one" data-content="{{$faq->title}}">
                        {!!$faq->description!!}
                    </div>
                </div>
            @endforeach
        @endif
    </div>