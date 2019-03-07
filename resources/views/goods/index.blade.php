
投稿一覧<br>
<table>
    <tr><th>ユーザーID</th><th>タイトル</th><th>内容</th></tr>
@foreach($goods as $good)
    <tr>
        <td>{{ $good->height }}</td>
        <td>{{ $good->width }}</td>
        <td><img class="card-img-top" src="{{ url("/images/${good}") }}" style="height: auto;"></td>
    </tr>
@endforeach
</table>
