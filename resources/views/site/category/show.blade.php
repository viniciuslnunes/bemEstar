@extends('layouts.site')

@section('content')
    <header class="common-header">
        <div class="header-wrapper">
            <h1 class="title-large">With apples drink teriyaki. </h1>
        </div>
        <div class="pattern__header"></div>
    </header>

    <div class="products__general main-wrapper">

        <aside class="product__selected">
            <article class="card__product">
                <a href="products-detail.php">
                    <div class="card__cover">
                        <img src="{{asset($categories->image)}}" style="width: 322px;">
                    </div>
                    <header class="card__product-header">
                        <h2 class="title-medium">{{$categories->name}}</h2>
                        <p>{{$categories->description}}</p>
                    </header>
                </a>
            </article>
            <a class="back-to-products" href="{{route('site.categorias')}}">Voltar</a>
        </aside>

        <section class="products__list">
            <header>
                @if($categories->status === 1)
                <div style="color:white;">Status: <span style="color:green;">Finalizado</span></div>
                @else
                <div style="color:white;">Status: <span style="color:yellow;">Não finalizado</span></div>
                @endif
                <p>Avaliado por: Vinicius.
                
                <br>
                grandis palus est. Sunt mensaes magicae fatalis, placidus genetrixes. Cum musa unda, omnes amores attrahendam pius </p>
            </header>
            @foreach($categories->assessments as $assessment)
            <article class="product">
                <a class="clickable-area" href="javascript:;">
                    <header class="product__header">
                        <h3 class="title-medium">{{$assessment->name}} </h3>
                        <h3 class="title-medium">{{$assessment->client->name}} </h3>

                        <!-- Tooggle item -->
                        <span class="collapse__open"></span>
                    </header>
                    @if($assessment->exclusive)
                        <img class="exclusive__label" src="{{asset('images/Exclusivo-label.png')}}" alt="Etiqueta de
                        produto
                        exclusivo">
                    @endif
                </a>

                <section class="product__content">

                    <div class="product__desciption">
                        {{$assessment->description}}
                    </div>

                </section>
            </article>
            @endforeach
        </section>
    </div>
@endsection
