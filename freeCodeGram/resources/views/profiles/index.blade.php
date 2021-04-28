@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://scontent-man2-1.cdninstagram.com/v/t51.2885-19/s150x150/97566921_2973768799380412_5562195854791540736_n.jpg?tp=1&_nc_ht=scontent-man2-1.cdninstagram.com&_nc_ohc=o20BuuJm14gAX9UTHYZ&edm=ABfd0MgAAAAA&ccb=7-4&oh=c62f53edf365f892f76ac2de421d6a10&oe=60A60467&_nc_sid=7bff83" class="rounded-circle" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="https://scontent-man2-1.cdninstagram.com/v/t51.2885-15/e35/c0.96.989.989a/s320x320/176561193_225655929312942_561539998995527690_n.jpg?tp=1&_nc_ht=scontent-man2-1.cdninstagram.com&_nc_cat=106&_nc_ohc=8OgI6KMVOVQAX-PJxpD&edm=ABfd0MgAAAAA&ccb=7-4&oh=719e3d1cd86c32baa034726aa8ba5b1d&oe=60AAEA99&_nc_sid=7bff83" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="https://scontent-man2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/c68.0.692.692a/s640x640/176047112_911444749698369_4031989567270642530_n.jpg?tp=1&_nc_ht=scontent-man2-1.cdninstagram.com&_nc_cat=109&_nc_ohc=lsgJUaev9lIAX8l_XJc&edm=ABfd0MgAAAAA&ccb=7-4&oh=2d2ce1deba6bf7330f7d3225734ed379&oe=60AA7233&_nc_sid=7bff83" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="https://scontent-man2-1.cdninstagram.com/v/t51.2885-15/e35/c1.0.826.826a/s480x480/172534872_1137110053468901_1056992050505928233_n.jpg?tp=1&_nc_ht=scontent-man2-1.cdninstagram.com&_nc_cat=105&_nc_ohc=HIDxUpRd-VEAX93zrte&edm=ABfd0MgAAAAA&ccb=7-4&oh=ec173b91bd159575c97cc5cb21165c1b&oe=60AC0012&_nc_sid=7bff83" class="w-100" alt="">
        </div>
    </div>
</div>
@endsection
