<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Blog Ekle</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1 class="text-center m-3">Blog Ekle</h1>
        <form method="post" action="{{route('blog-kaydet')}}" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach (config('translatable.locales') as $key => $value)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#blog_{!! $key !!}" type="button" role="tab" aria-controls="blog"
                                aria-selected="true">{!! $value !!} - Blog
                        </button>
                    </li>
                @endforeach
            </ul>
            @php    $aktif = '0'    @endphp

                <div class="tab-content" id="myTabContent">
                    @foreach (config('translatable.locales') as $key => $value)
                    <div class="tab-pane fade {!! $aktif === '0'?'show active':' ' !!}" id="blog_{!! $key !!}" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-3 mt-4">
                            <label for="exampleFormControlInput1" class="form-label">Blog Başlığı - {!! $value !!}</label>
                            <input type="text" class="form-control" name="txt_BlogBasligi_{!! $key !!}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Blog İçeriği - {!! $value !!}</label>
                            <textarea class="form-control" name="txt_BlogIcerigi_{!! $key !!}" rows="3"></textarea>
                        </div>
                        @if($aktif === '0')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Yazar</label>
                                <input type="text" class="form-control" name="txt_Yazar">
                            </div>
                        @endif
                    </div>
                        @php     $aktif = '1'   @endphp
                    @endforeach
                </div>

            <input type="submit" class="btn btn-primary" name="btn_kaydet" value="Kaydet"/>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>
</html>
