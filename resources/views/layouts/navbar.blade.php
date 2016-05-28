{!! Breadcrumbs::render($breadcrumbs['0'], $breadcrumbs['1']) !!}
<div class="nav-module-menu box-margin">
    <nav class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li role="presentation" @if($navigate == 'index') class="active" @endif><a href="{{ url('/tracker/') }}" title="Главная">Главная</a></li>
                    <li role="presentation"@if($navigate == 'popular') class="active" @endif><a href="{{ url('/tracker/popular') }}" title="Популярные">Популярные</a></li>
                    <li role="presentation"@if($navigate == 'tags') class="active" @endif><a href="{{ url('/tracker/tags') }}" title="Теги">Теги</a></li>
                    <li role="presentation"@if($navigate == 'create') class="active" @endif><a href="{{ url('/tracker/create') }}" title="Добавить публикацию">Добавить публикацию</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>