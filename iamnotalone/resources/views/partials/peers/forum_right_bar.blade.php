<a href="#topicModal" rel="modal:open" class="border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
    <span class="uil uil-plus"></span>
    Start a New Topic
</a>

<div class="rounded rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mt-16">
    <div class="flex flex-row p-4">
        <div class="w-3/4">
            <p class="font-light font-light uppercase text-sm">Popular Topics</p>
            @foreach ($ncp as $post)
                <p class="font-semibold text-sm my-6">
                    <a href="{{route('forum.topics.popular', ['id'=>$post->id])}}">{{$post->title}}</a>
                </p>
            @endforeach
        </div>
        <div class="1/4 text-center">
            <p class="font-light font-light uppercase text-sm">Comments</p>
            <p class="font-semibold text-sm my-6">
                @foreach ($ncp as $post)
                    <a href="{{route('forum.topics.popular', ['id'=>$post->id])}}">{{$post->postComments}}</a>
                @endforeach
            </p>
        </div>
    </div>
</div>