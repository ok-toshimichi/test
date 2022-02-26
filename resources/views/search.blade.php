<p><input type="text" name="keyword" value="{{ $keyword }}" placeholder="- キーワード検索 -"></p>
<select
    name="search_id"
    id="search_id"
    value="{{ $search_id }}"
>
    <option value=""> - 選択してください - </option>
    @foreach($companies as $company)
    <option value="{{ $company->id }}">
        {{ $company->company_name }}
    </option>
    @endforeach
</select>
<br>
<br>
<p><input type="submit" value="検索"></p>

