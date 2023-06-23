@if(count($data) > 0)
<table class="table">
    <thead>
        <tr>
            
            <th>Dự án</th>
            <th>Kênh chạy</th>
            <th>Nhà cung cấp</th>
            <th>Số tiền</th>
            <th>Ngày hoàn thành</th>
        </tr>
    </thead>
    
    <tbody>
        <?php $tatall = 0; ?>
        @foreach($data as $val)
        <tr>
            
            <td>{{$val->Project->name}}</td>
            <td>{{$val->Channel->name}}</td>
            <td>{{$val->Supplier->name}}</td>
            <td>{{ number_format($val->price) }}đ</td>
            <td style="display: flex;">
                <a href="{{route('task.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                <form action="{{route('task.destroy', [$val->id])}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        <?php $tatall = $tatall + $val->price; ?>
        @endforeach
    </tbody>
    <div class="tatall">Tổng tiền: {{ number_format($tatall) }}đ</div>
</table>
@endif