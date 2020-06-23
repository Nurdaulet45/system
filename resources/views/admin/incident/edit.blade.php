@extends('layouts.app_admin')

@section('content')
    <section class="content">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Инцидент</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @include('include\result_messages')
          <div class="row">

            <div class="col-md-8" style="border-right: 2px solid #ecf0f5;">
              <form action="{{ route('system.admin.incidents.store')}}" method="post">
                @method('post')
                @csrf
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Тема:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->title}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Приоритет:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->priority}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Статус:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->status}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Описание:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->description}}</label>
                </div>
              </div>
              @if($incident->comment)
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Комментария:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->comment}}</label>
                </div>
              </div>
              @endif
               
                @if($incident->status != 'подтверждено' || $incident->status != 'сделано')
                <div class="row form-group">
                  <div class="col-md-3">
                    <p style="font-size: 16px">Перенаправить:</p>
  
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" name="redirect" aria-required="false ">
                    
                    <option selected selected disabled> {{$incident->specialist_id}}Выберите специалиста </option>
  
                    {{-- @if ($incident->specialist_id) --}}
  
                    @foreach ($specialists as $specialist)
                    
                        <option @if($incident->user_id && $incident->user_id == $specialist->id) selected  @endif value="{{$specialist->id}}" >{{ $specialist->full_name}}</option>
                      @endforeach
                      {{-- @else --}}
                    
                    {{-- @endif --}}
  
                    </select>
                    {{-- <label style="font-size: 16px">{{ $incident->comment}}</label> --}}
                  </div>
                </div>
                @endif
             
              <div class="row form-group">
                @if($incident->image)
                <div class="col-md-3">
                  <p style="font-size: 16px">Фото:</p>
                  <div class="col-md-9" >
                  <img style="padding-left:30px" src="{{ asset('./uploads/incidents/'.$incident->image) }}" alt="" width="450px" height="200px">
                  </div>
                </div>
              @endif
                {{-- <div class="col-md-3">
                  <p style="font-size: 16px">Фото:</p>

                </div>
                <div class="col-md-9">
                    <label style="font-size: 16px">{{ $incident->image}}</label>
                </div> --}}
              </div>
              {{-- <div class="form-group">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Приоритет:</p>
                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">Приоритет</label>
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Описание</label>
                <textarea name="description" id="description" class="form-control"  cols="60  " rows="5  ">
                </textarea>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Фото</label>
                <select class="form-control select2" data-select2-id="11" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                  <option selected="selected" data-select2-id="11">Alabama</option>
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
                <textarea name="description" id="description" class="form-control"  cols="60  " rows="5  ">
                </textarea>
              </div> --}}
               @if ($incident->status == 'сделано')
               <a href="{{route('system.admin.incidents.confirm', $incident->id)}}">
                  <button class="btn btn-success" type="button">Подтвердить</button></a>
                  <a href="{{route('system.admin.incidents.revision', $incident->id)}}">
                    <button class="btn btn-danger" type="button">На доработку</button></a>
                    <a href="{{route('system.admin.incidents')}}">
                      <button class="btn" type="button">Назад</button></a>
                @endif

                @if($incident->status == 'подтверждено')
                <a href="{{route('system.admin.incidents.revision', $incident->id)}}">
                  <button class="btn btn-danger" type="button">На доработку</button></a>
                  <a href="{{route('system.admin.incidents')}}">
                    <button class="btn" type="button">Назад</button></a>
                @endif
                @if ($incident->status !== 'подтверждено' && $incident->status !== 'сделано')
                <div class="box-footer">
                  <input type="hidden" name="incident_id" value="{{$incident->id}}">
                  <button class="btn btn-primary" type="submit">Сохранить</button>
                  <a href="{{route('system.admin.incidents')}}">
                    <button class="btn btn-danger" type="button">Отмена</button></a>
                </div>   
                @endif
              </form>
                  <!-- /.form-group -->
            </div>
            <div class="col-md-4" style="width: 32%;" >
              <div class="row">
                <p style="font-size: 32px; padding:0px 15px">Дата</p>
              </div>
                <div class="row col-md-12">
                  <div class="col-md-6" style="padding-left:0px">
                    <p style="font-size: 16px" >Дата создание:</p>
                  </div>
                  <div class="col-dm-6">
                    <label style="font-size: 16px">{{ $incident->created_at}}</label>
                  </div>
                </div>
                <div class="row col-md-12" >
                  <div class="col-md-6" style="padding-left:0px">
                    <p style="font-size: 16px">Дата обнавление:</p>
                  </div>  
                  <div class="col-dm-6">
                    <label style="font-size: 16px">{{ $incident->updated_at}}</label>
                  </div>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>
  
      </section>
    {{-- /.content--}}
@endsection
