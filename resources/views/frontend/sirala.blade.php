
    <div class="col-md-12 m-2">
    {!! Form::open(['url'=>'/properties_search','method'=>'post']) !!}
    <select name="order">

      <option selected value="">Hamısı</option>
      <option value="2"><a href>Kirayə</a></option>
      <option value="1">Satılan</option>

    </select>
    <button type="submit" class="btn btn-light"  style="font-family:'Sarabun',sans-serif;margin-left:20px;">Seç</button>

    {!! Form::close() !!}
    </div>
