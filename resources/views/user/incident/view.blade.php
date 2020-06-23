@extends('layouts.app_admin')

@section('content')
    <section class="content">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Инцидент</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row col-md-8" style="display: flex;">
            <div class="row col-md-12" style="">
              <div class="col-md-5" style="margin: 0; padding:0px 15px;">
                <label>Тема:</label>
               </div>
               <div class="col-md-7" style="margin: 0; padding:0px 15px;">
                <p><b>{{ ucfirst($incident->title)}}</b> </p>
               </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-5" style="margin: 0; padding:0px 15px;">
                <label>Приоритет:</label>
               </div>
               <div class="col-md-7" style="margin: 0; padding:0px 15px;">
                <p><b>{{ ucfirst($incident->priority)}}</b> </p>
               </div>
            </div><div class="row col-md-12">
              <div class="col-md-5" style="margin: 0; padding:0px 15px;">
                <label>Описание:</label>
               </div>
               <div class="col-md-7" style="margin: 0; padding:0px 15px;">
                <p><b>{{ ucfirst($incident->description)}}</b> </p>
               </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-5" style="margin: 0; padding:0px 15px;">
                <label>Фото:</label>
               </div>
               <div class="col-md-7" style="margin: 0; padding:0px 15px;">
                <p><b>{{ ($incident->img)}}</b> </p>
               </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-5" style="margin: 0; padding:0px 15px;">
                <label>Комментария специалиста:</label>
               </div>
               <div class="col-md-7" style="margin: 0; padding:0px 15px;">
                <p>{{ ucfirst($incident->comment)}} </p>
               </div>
            </div>
            @if($incident->image)
              <div class="row col-md-12">
                <div class="col-md-5" style="margin: 0; padding:0px 15px;">
                  <label>Фото:</label>
                </div>
                <div class="col-md-7" style="margin: 0; padding:0px 15px;">
                <img src="{{ asset('./uploads/incidents/'.$incident->image) }}" alt="" width="350px" height="200px">
                </div>
              </div>
            @endif
         
          </div>
     
          <div class="row col-md-4" >
            {{-- <div class="col-md-8" style="border-right: 2px solid #ecf0f5;">
        
              <div class="form-group">
                <label>Тема</label> <li>Alamba</li>
                
                <select class="form-control  "  disabled style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Приоритет</label>
                <select class="form-control " disabled style="width: 100%;" >
                  <option>Medium</option>
                  <option>start</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              
              <!-- /.form-group -->
              <div class="form-group">
                <label>Описание</label>
                <textarea name="description" disabled id="description" class="form-control"  cols="60  " rows="5  ">
                </textarea>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Фото</label>
                <select class="form-control select2 " style="width: 100%;" disabled>
                  <option >Alabama</option>
                  <option>Alaska</option>
                  <option disabled="disabled">California (disabled)</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <div class="form-group">
                <label>Комментария специалиста</label>
                <textarea name="description" disabled id="description" class="form-control"  cols="60  " rows="5  ">
                </textarea>
              </div>
              <div class="box-footer">
                <input type="hidden" name="id" value="">
      
           <a href="{{route('system.user.incidents.index')}}">
                <button class="btn btn-primary btn-lg" type="button">Назад</button></a>

            </div>
              <!-- /.form-group --> --}}
            {{-- </div>
            <div class="col-md-4" style="width: 32%;" > --}}  
              <div class="row col-md-12">
                <p style="font-size: 24px;">Даты</p>

              </div>

              <div class="row col-md-12">
                <div class="col-md-6" style="margin: 0; padding:0px 15px;">
                  <label>Дата создание:</label>
                 </div>
                 <div class="col-md-6" style="margin: 0; padding:0px 15px;">
                  <p>{{ $incident->created_at}} </p>
                 </div>
              </div>
               
              <div class="row col-md-12">
                <div class="col-md-6" style="margin: 0; padding:0px 15px;">
                  <label>Дата обновление:</label>
                 </div>
                 <div class="col-md-6" style="margin: 0; padding:0px 15px;">
                  <p>{{ $incident->updated_at}} </p>
                 </div>
              </div>
            {{-- </div> --}}
            <!-- /.col -->
          </div>
          <!-- /.row -->
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <input type="hidden" name="id" value="">

     <a href="{{route('system.user.incidents.index')}}">
          <button class="btn btn-primary " type="button">Назад</button></a>

      </div>
  
      </div>
  
      </section>
    {{-- /.content--}}
@endsection



