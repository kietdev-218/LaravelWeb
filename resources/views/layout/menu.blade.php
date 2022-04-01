<div class="col-md-3">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1" style="background-color:#87CEFA;">
            <i class="fa fa-anchor"></i>  Danh mục
        </li>
        @foreach($theloai as $tl)
            @if(count($tl->loaidiadiem) > 0)
                <li href="#" class="list-group-item menu1"><i class="fa fa-angle-double-down"></i>
                   {{$tl->Ten}}
                </li>

                <ul>
                    @foreach($tl->loaidiadiem as $ldd)
                        <li class="list-group-item">
                            <a href="loaidiadiem/{{$ldd->id}}/{{$ldd->TenKhongDau}}.html"><i class="fa fa-angle-right"></i> {{$ldd->Ten}}</a>
                        </li>
                    @endforeach
                    </li>
                </ul>
            @endif
        @endforeach
    </ul>

    <div class="leftC">
        <div class="panel-body">
                <li href="#" class="list-group-item" style="background-color:#87CEFA;">
                        <i class="fa fa-anchor"></i>  Còn nhiều nữa
                </li>
            @foreach($theloai as $tl)
                @if(count($tl->loaidiadiem) > 0)
                <!-- item -->
                <div class="row-item row">
                    <?php
                        $data = $tl->ttmonan->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                        $tin1 = $data->shift();
                    ?>
                    <div class="col-md-11">
                        <h4>
                                <a>{{$tl->Ten}}</a> |
                        </h4>
                        @foreach($data->all() as $ttmonan)
                        <a href="ttmonan/{{$ttmonan['id']}}/{{$ttmonan['TieuDeKhongDau']}}.html">
                            <h5>
                                <span class="glyphicon glyphicon-zoom-in"></span>
                                {{$ttmonan['TieuDe']}}
                            </h5>
                        </a>
                        @endforeach
                    </div>
                    
                    <div class="break"></div>
                </div>
                <!-- end item -->
                @endif
            @endforeach

        </div>
    </div>

</div>

<style type="text/css">
    .leftC {
        width: 100%;
        height: 795px;
        background: #ffffff;
}
</style>

