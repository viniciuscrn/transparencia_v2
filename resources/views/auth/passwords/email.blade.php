<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar área ADM Setor Compras</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer>
    </script>

</head>

<body>

    <div class="container col-11 col-md-9" id="form-container">
        <div class="row align-items-center gx-5">
            <div class="col-md-6">
                <h2>Insira seu e-mail</h2>
                @if ($errors->any())
                    <div class="alert alert-danger border-left-danger" role="alert">
                        <ul class="pl-4 my-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success border-left-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="user">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Digite seu e-mail">
                        <label for="email" class="form-label">Digite seu email</label>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-outline-success btn-lg" value="Redefinir">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-12">
                        <img src="{{ asset('img/svg/reset-senha.svg') }}" alt="Reset de senha" class="img-fluid">
                    </div>
                    <div class="col-12" id="link-reset">
                        <a href="{{ route('login') }}"> Já tenho login e senha</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
