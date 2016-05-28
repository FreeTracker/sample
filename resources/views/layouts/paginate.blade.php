<?php
$total=$paginate->total();
$perPage = $paginate->perPage();
$lastPage = ceil($total/$perPage);
$curPage = $paginate->currentPage();
?>

@if($lastPage > 1)
<div class="row text-center col-xs-12 " style="margin-top: -30px">
    <nav>
        <ul class="pagination">
            @if($curPage > 3)
                <li><a href="{{ $paginate->url('1') }}"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i></a></li>
            @endif
            @if($curPage > 1)
                <li><a href="{{ $paginate->url($curPage - 1) }}"><i class="fa fa-chevron-left"></i></a></li>
            @endif
            @for($i=1; $i<=$lastPage; $i++)
                @if($i == $curPage)
                    <li class="active"><a>{{ $curPage }}</a></li>
                @elseif((($i > ($curPage -3)) and ($i <($curPage +3))))
                    <li><a href="{{ $paginate->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if($lastPage > $curPage)
                <li><a href="{{ $paginate->url($curPage + 1) }}"><i class="fa fa-chevron-right"></i></a></li>
            @endif
            @if($lastPage > ($curPage + 2))
                <li><a href="{{ $paginate->url($lastPage) }}"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a></li>
            @endif
        </ul>
    </nav>
</div>
@endif