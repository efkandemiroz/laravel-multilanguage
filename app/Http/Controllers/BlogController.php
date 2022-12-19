<?php

    namespace App\Http\Controllers;

    use App\Models\Blogs;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class BlogController extends Controller
    {
        public function BlogKaydet(Request $request)
        {
            $blog = new Blogs();

            $blog->yazar = $request->input('txt_Yazar');
            $blog->blog_tarihi = Carbon::now();
            //Burada Dikkat edilmesi gereken kısım.
            //Sabit tanımladıktan ekledikten sonra verilerimizi kaydediyoruz ve sonrasında dil çevirilerini ekliyoruz.
            $blog->save();
            foreach (config('translatable.locales') as $key => $value) {
                $blog->translateOrNew($key)->baslik = $request->input('txt_BlogBasligi_' . $key);
                $blog->translateOrNew($key)->icerik = $request->input('txt_BlogIcerigi_' . $key);
            }
            $status = $blog->save();

            if ($status) {
                return back()->with('durum', 'basarili');
            } else {
                return back()->with('durum', 'hata');
            }
        }

        public function Bloglar(Request $request)
        {
            $blogs=Blogs::get();
            return view('bloglar')->with('bloglar',$blogs);
        }
    }
