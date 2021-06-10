<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>       
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>


    <title>@yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="/js/form.js" defer></script>
    <script>
    

const quests = [];

function exclusaoQuest(quest_value) {
    document
        .querySelectorAll("span.quest")
        .forEach((quest, index) => {
            if (quest.innerText === quest_value) {
                document
                    .querySelectorAll("#container_quest li")
                [index].remove();
                quests.splice(index, 1);
            }
        });
}

function createLine(quest_value) {
    const container_quest =
        document.querySelector("#container_quest");
    const li = document.createElement("li");
    const span = document.createElement("span");
    const button_excluir = document.createElement("button");
    button_excluir.innerText = "Excluir";
    button_excluir.onclick = () => exclusaoQuest(quest_value);
    span.innerText = quest_value;
    span.className = "quest";
    li.appendChild(span);
    li.appendChild(button_excluir);
    container_quest.appendChild(li);
}

function createQuest() {
    const quest_value = document.querySelector(
        'input[name="quest"]',
    ).value;
    quests.push(quest_value);
    createLine(quest_value);
    document.querySelector('input[name="quest"]').value = "";
}

async function submitForm() {
    const name_form = document.querySelector(
        'input[name="form_name"]',
    ).value;
    const name_user =
        document.querySelector("#name_user").innerText;
    const body = { name_form, name_user, quests };
    const res = await (
        await fetch("http://localhost:8000/clientes/store", {
            method: "POST",
            body: JSON.stringify(body),
        })
    ).json();
}
    </script>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-dark text-white shadow-sm">
        Bem-vindo(a), Vinícius
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.clientes') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.clientes.criar') }}">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.formularios') }}">Formulários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.formularios.criar') }}">Novo Formulário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.avaliacoes') }}">Avaliações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.avaliacoes.criar') }}">Nova Avaliação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.clientes') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('site.clientes') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    
    
</body>

</html>