<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.includes.head')

</head>

<body>

    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>

            @include('admin.includes.sidebar')



            <div class="content">
                @include('admin.includes.navbar')

                @yield('content')



                @include('admin.includes.footer')
            </div>

        </div>
    </main>

    {{-- @include('admin.includes.customsidebar') --}}

    {{-- @include('admin.staff.index') --}}

    @include('admin.includes.scripts')

</body>

</html>
