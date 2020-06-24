<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Corona Telah Membuat Kita Sadar Akan Pentingnya Menjaga Kesehatan',
            'slug' => 'corona-telah-membuat-kita-sadar-akan-pentingnya-menjaga-kesehatan',
            'category_id' => 6,
            'image' => 'corona-telah-membuat-kita-sadar-akan-pentingnya-menjaga-kesehatan.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 2107
        ]);

        Post::create([
            'title' => 'Ibu Rumah Tangga Bisa Apa? Eits Lihat Dulu Yang Satu Ini',
            'slug' => 'ibu-rumah-tangga-bisa-apa-eits-lihat-dulu-yang-satu-ini',
            'category_id' => 1,
            'image' => 'ibu-rumah-tangga-bisa-apa-eits-lihat-dulu-yang-satu-ini.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 100
        ]);

        Post::create([
            'title' => 'Media Sosial Saat Ini Telah Menjadi Tempat Curhat Anak-Anak Remaja',
            'slug' => 'media-sosial-saat-ini-telah-menjadi-tempat-curhat-anak-anak-remaja',
            'category_id' => 8,
            'image' => 'media-sosial-saat-ini-telah-menjadi-tempat-curhat-anak-anak-remaja.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 3000
        ]);

        Post::create([
            'title' => 'Vr Terbukti Dapat Membantu Anak Belajar Lebih Efisien',
            'slug' => 'vr-terbukti-dapat-membantu-anak-belajar-lebih-efisien',
            'category_id' => 2,
            'image' => 'vr-terbukti-dapat-membantu-anak-belajar-lebih-efisien.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 69
        ]);

        Post::create([
            'title' => 'Keluarga Baru Ini Mendapat Hadiah Design Ruang Keluarga, Lihat Keindahannya',
            'slug' => 'keluarga-baru-ini-mendapat-hadiah-design-ruang-keluarga-lihat-keindahannya',
            'category_id' => 5,
            'image' => 'keluarga-baru-ini-mendapat-hadiah-design-ruang-keluarga-lihat-keindahannya.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 2050
        ]);

        Post::create([
            'title' => 'Cantik Tidak Harus Selalu Pakai Makeup, Wanita Satu Ini Selalu Terlihat Cantik Meski Baru Bangun Dari Tidur',
            'slug' => 'cantik-tidak-harus-selalu-pakai-makeup-wanita-satu-ini-selalu-terlihat-cantik-meski-baru-bangun-dari-tidur',
            'category_id' => 1,
            'image' => 'cantik-tidak-harus-selalu-pakai-makeup-wanita-satu-ini-selalu-terlihat-cantik-meski-baru-bangun-dari-tidur.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 200
        ]);

        Post::create([
            'title' => 'Inilah Beberapa Teknologi Yang Tercipta Untuk Membantu Pekerjaan Manusia',
            'slug' => 'inilah-beberapa-teknologi-yang-tercipta-untuk-membantu-pekerjaan-manusia',
            'category_id' => 2,
            'image' => 'inilah-beberapa-teknologi-yang-tercipta-untuk-membantu-pekerjaan-manusia.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 300
        ]);

        Post::create([
            'title' => 'Robot Ini Dapat Menemani Anak Anda Bermain, Simak Beritanya',
            'slug' => 'robot-ini-dapat-menemani-anak-anda-bermain-simak-beritanya',
            'category_id' => 2,
            'image' => 'robot-ini-dapat-menemani-anak-anda-bermain-simak-beritanya.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 800
        ]);

        Post::create([
            'title' => 'Gaya Punk Bukan Berarti Bodoh Dan Brandalan, Simak Beberapa Ulasan Ini',
            'slug' => 'gaya-punk-bukan-berarti-bodoh-dan-brandalan-simak-beberapa-ulasan-ini',
            'category_id' => 1,
            'image' => 'gaya-punk-bukan-berarti-bodoh-dan-brandalan-simak-beberapa-ulasan-ini.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 1000
        ]);

        Post::create([
            'title' => 'Yoga Salah Satu Olahraga Yang Paling Banyak Dilakukan, Mengapa? Yuk Simak',
            'slug' => 'yoga-salah-satu-olahraga-yang-paling-banyak-dilakukan-mengapa-yuk-simak',
            'category_id' => 3,
            'image' => 'yoga-salah-satu-olahraga-yang-paling-banyak-dilakukan-mengapa-yuk-simak.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 69
        ]);

        Post::create([
            'title' => 'Ingin Punya Perut Sixpack? Ikuti Pola Makan Ini Terutama Bagi Kaum Wanita',
            'slug' => 'ingin-punya-perut-sixpack-ikuti-pola-makan-ini-terutama-bagi-kaum-wanita',
            'category_id' => 3,
            'image' => 'ingin-punya-perut-sixpack-ikuti-pola-makan-ini-terutama-bagi-kaum-wanita.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 69
        ]);

        Post::create([
            'title' => 'Motor Bebek Ini Laris Dipasan Internasional, Inilah Beberapa Kelebihannya',
            'slug' => 'motor-bebek-ini-laris-dipasan-internasional-inilah-beberapa-kelebihannya',
            'category_id' => 4,
            'image' => 'motor-bebek-ini-laris-dipasan-internasional-inilah-beberapa-kelebihannya.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 400
        ]);

        Post::create([
            'title' => 'Menurunkan Beran Badan Lebih Efektif Dengan Angkat Beban',
            'slug' => 'menurunkan-beran-badan-lebih-efektif-dengan-angkat-beban',
            'category_id' => 3,
            'image' => 'menurunkan-beran-badan-lebih-efektif-dengan-angkat-beban.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 69
        ]);

        Post::create([
            'title' => 'Beberapa Dekorasi Yang Dapat Menjadi Inspirasi Kita Dalam Dekorasi Taman',
            'slug' => 'beberapa-dekorasi-yang-dapat-menjadi-inspirasi-kita-dalam-dekorasi-taman',
            'category_id' => 5,
            'image' => 'beberapa-dekorasi-yang-dapat-menjadi-inspirasi-kita-dalam-dekorasi-taman.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 2100
        ]);

        Post::create([
            'title' => 'Para Masyarakat Memulai New Normal Ditandai Dengan Padatnya Lalu Lintas',
            'slug' => 'para-masyarakat-memulai-new-normal-ditandai-dengan-padatnya-lalu-lintas',
            'category_id' => 6,
            'image' => 'para-masyarakat-memulai-new-normal-ditandai-dengan-padatnya-lalu-lintas.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 2104
        ]);

        Post::create([
            'title' => 'Tetap Dirumah Adalah Pilihan Terbaik Saat Ini, Tapi Mau Sampai Kapan?',
            'slug' => 'tetap-dirumah-adalah-pilihan-terbaik-saat-ini-tapi-mau-sampai-kapan',
            'category_id' => 6,
            'image' => 'tetap-dirumah-adalah-pilihan-terbaik-saat-ini-tapi-mau-sampai-kapan.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 2160
        ]);

        Post::create([
            'title' => 'Para Pegiat Media Sosial Menemukan Karakteristik Baru Dari Masyarakat',
            'slug' => 'para-pegiat-media-sosial-menemukan-karakteristik-baru-dari-masyarakat',
            'category_id' => 8,
            'image' => 'para-pegiat-media-sosial-menemukan-karakteristik-baru-dari-masyarakat.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 140
        ]);

        Post::create([
            'title' => 'Mobil Lama Serasa Baru Ini Telah Dapat Penghargaan',
            'slug' => 'mobil-lama-serasa-baru-ini-telah-dapat-penghargaan',
            'category_id' => 4,
            'image' => 'mobil-lama-serasa-baru-ini-telah-dapat-penghargaan.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non venenatis odio. Nulla erat dui, auctor ac
                malesuada non, hendrerit vel ex. Maecenas quis diam augue. Nam enim diam, sagittis non ante a, viverra dignissim urna. Nunc
                ultricies, urna eu iaculis mollis, lectus sapien malesuada turpis, dapibus viverra elit urna vitae elit. Ut sollicitudin
                placerat ligula at ultricies. Sed dignissim urna odio, vitae ullamcorper sem dapibus at. Nulla faucibus, elit volutpat
                consequat lacinia, risus mauris tristique sem, et posuere diam enim vitae eros. Phasellus et malesuada erat. Sed eu
                tempus magna, eget porta est. Sed tincidunt in sem eget cursus. Mauris id erat at augue pellentesque pretium sed dictum
                massa. Mauris tellus tellus, tristique id augue quis, consequat sodales risus. Etiam semper nulla a ornare
                ultricies.<br />
                <br />
                Suspendisse in auctor nunc. Nullam iaculis tellus vel enim luctus mollis. Vivamus non libero a eros consequat
                faucibus at at erat. Donec ut elit hendrerit, condimentum nunc id, sagittis tellus. Morbi maximus efficitur
                pellentesque. Vivamus a dui vulputate, lobortis dui at, interdum nisl. Maecenas tempus et turpis aliquet convallis.
                Curabitur viverra sed nunc non facilisis.<br />
                <br />
                Nam eu sagittis velit, non accumsan magna. Praesent sed sapien faucibus, facilisis quam a, convallis nisi. Morbi
                sagittis feugiat vestibulum. Cras tincidunt orci et dui finibus, non tincidunt augue dictum. Praesent ultrices, augue
                vulputate auctor venenatis, ligula nisi interdum purus, in elementum urna enim ut odio. Curabitur pellentesque dui in
                ipsum elementum, eget pulvinar sem sodales. Nulla eu lorem interdum augue consectetur ultricies in vitae lectus.
                Nam turpis massa, semper ut molestie at, porttitor sit amet sapien. In mattis scelerisque risus, quis egestas libero
                convallis in. Phasellus sed vehicula tortor. Sed venenatis velit a ligula porttitor, nec ornare diam tempus. Sed
                pellentesque ipsum justo, in tincidunt libero suscipit vel. Sed at feugiat velit. Pellentesque in tortor ac massa
                vehicula sagittis ut in ante. Sed ut elementum metus, fringilla bibendum massa. Mauris fringilla sagittis faucibus.
                Aenean volutpat tristique eleifend. Cras vitae nulla eu ex mattis dignissim. Nunc tempor fermentum porttitor.
                ',
            'author' => 1,
            'status' => 1,
            'view' => 2000
        ]);
    }
}
