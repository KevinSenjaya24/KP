<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Jemaat;
use App\Family;
use App\CategoryReservation;
use App\Reservation;
use App\CategoryPost;
use App\Post;
use App\Banner;
use App\Pelayan;
use App\Pelayanan;
use App\Lagu;
use App\LaguIbadah;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $CateId = CategoryReservation::find($request->id);
        $reservationId = Reservation::where('category_reservation_id', $request->id)->get();
        $pelayanan = Pelayanan::where('category_reservation_id', $request->id)->get();
        $pelayan = Pelayan::get();
        $lagu = Lagu::get();
        $laguIbadah = laguIbadah::where('category_reservation_id', $request->id)->get();
        

        $ultah = Jemaat::whereDay('tanggal_lahir', $day)->whereMonth('tanggal_lahir', $month)->get();

        $ultahfirst = Jemaat::whereDay('tanggal_lahir', $day)->whereMonth('tanggal_lahir', $month)->first();
        $banner = Banner::get();
        $categoryPost = CategoryPost::get();
        $countcategoryPost = CategoryPost::count();
        $countpengumuman = Post::where('category_post_id', '4')->count();
        $countwartajemaat = Post::where('category_post_id', '3')->count();
        $countrenunganharian = Post::where('category_post_id', '2')->count();
        $post = Post::paginate(3);
        $notif = Post::where('category_post_id', '4')->whereDay('tanggal', $day)->whereMonth('tanggal', $month)->get();
        $pengumuman = Post::where('category_post_id', '4')->where('active', 'aktif')->paginate(10);
        $wartajemaat = Post::where('category_post_id', '3')->paginate(10);
        $renunganharian = Post::where('category_post_id', '2')->paginate(10);
        $jemaat = Jemaat::get();
        $countjemaat = Jemaat::count();
        $countfamily = Family::count();
        $category = CategoryReservation::get();
        $reservation = Reservation::get();
        $data = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->get();
        View::share('categories', $category);
        View::share('category', $CateId);
        View::share('reservationspdf', $reservationId);
        View::share('lagus', $lagu);
        View::share('laguIbadahs', $laguIbadah);
        View::share('pelayanans', $pelayanan);
        View::share('pelayans', $pelayan);

        View::share('banners', $banner);
        View::share('posts', $post);
        View::share('jemaats', $jemaat);
        View::share('countjemaat', $countjemaat);
        View::share('countfamily', $countfamily);

        View::share('notifs', $notif);
        View::share('pengumumans', $pengumuman);
        View::share('wartajemaats', $wartajemaat);
        View::share('renunganharians', $renunganharian);

        View::share('categoryPosts', $categoryPost);
        View::share('countPengumuman', $countpengumuman);
        View::share('countWartajemaat', $countwartajemaat);
        View::share('countRenunganharian', $countrenunganharian);

        View::share('ultah', $ultah);
        View::share('ultahfirst', $ultahfirst);

        
        
        
    }
}
