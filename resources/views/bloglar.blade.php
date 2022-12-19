<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Blog İçerikleri</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="btn-group m-5" role="group" aria-label="Basic example">
            @foreach (config('translatable.locales') as $key => $value)
            <a href="dil-degistir/{!! $key !!}" class="btn btn-outline-primary">{!! $value !!}</a>
            @endforeach
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Başlık</th>
                <th scope="col">İçerik</th>
                <th scope="col">Yazar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bloglar as $blog)
            <tr>
                <td>{{ $blog->translate(session('locale'))->baslik }}</td>
                <td>{{ $blog->translate(session('locale'))->icerik }}</td>
                <td>{{ $blog->yazar }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
