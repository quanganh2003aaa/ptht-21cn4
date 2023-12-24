<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('layouts.css')
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Tạo tài khoản</h5>
                                        <p class="text-center small">Nhập thông tin cá nhân của bạn để tạo tài khoản</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate action="{{ route('post.register') }}" method="POST">
                                        @csrf
                                        @if ($errord = session()->get('errors'))
                                            @foreach ($errors->messages() as $key => $error)
                                                <i style="color: red">{{ $error[0] }}</i>
                                            @endforeach
                                        @endif

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Mật khẩu</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required max="16" min="8">
                                            <div class="invalid-feedback">Hãy điền mật khẩu!</div>
                                        </div>

                                        <div class="col-12" style="padding: 0 0 15px 0">
                                            <label for="yourName" class="form-label">Nhập lại mật khẩu</label>
                                            <input type="password" name="password2" class="form-control" id="yourName"
                                                required>
                                            <div class="invalid-feedback">Hãy điền lại mật khẩu!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Tạo tài khoản</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layouts.js')

</body>

</html>
