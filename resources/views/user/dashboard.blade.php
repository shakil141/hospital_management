
    @include('user.user_partials.main_header')

    @include('user.user_partials.header')

    @include('user.user_partials.hero')

    <!-- .page-section -->

    @include('user.user_partials.content')

    <!-- Dcotor Section -->

    @include('user.user_partials.doctor')

    <!-- Doctor Section-->

    <!-- lastest-News-section -->

    @include('user.user_partials.news')

    <!-- lastest-News-section -->

    <!-- Contact Section -->

    @if(Route::has('login'))
    @auth
        @include('user.user_partials.contact')
    @endauth
    @endif


    <!-- Contact Section -->

    <!-- .banner-home -->

    @include('user.user_partials.banner')

    <!-- .banner-home -->

    <!-- footer section -->
    @include('user.user_partials.footer')
    <!-- footer section -->
