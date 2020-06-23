@extends('layouts.app_admin')

@section('content')

    <section class="content">
        {{-- Small boxes (Stat box) --}}
        <div class="box-body">
          @include('include\result_messages')
              <div class="row justify-content-between">

                      <div class="box">
                          <!-- /.box-header -->

                          <div class="col-md-3" style="border-right: 2px solid #d2d6de">
                          <h5>Выявленные инциденты</h5>
                            
                          </div>
                          <div class="col-md-3" style="border-right: 2px solid #d2d6de">
                            <h5>В работе</h5>
                            
                          </div>
                          <div class="col-md-3"  style="border-right: 2px solid #d2d6de">
                            <h5>Выполнено</h5>
                            
                          </div>
                          <div class="col-md-3">
                            <h5>Подтверждено</h5>
                            
                          </div>
                      </div>
                        </div>
                      
              </div>
              <div class="row" style="display: flex;   justify-content: space-between;              ">
                <div class="column">
                  @forelse ($onlyDiscovered as $discovered)
                  <div class="box" style="border-top: 3px solid red;">
                    <div class="box-header with-border" >
                    <h3 class="box-title"><a href="{{ route('system.admin.incidents.edit', $discovered->id)}}">{{ $discovered->title }}</a></h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      {{ $discovered->description }}
                    </div>
                    <!-- /.box-body -->
                  </div>
                  @empty
                  <div class="box" style="border-top: 3px solid red;">
                    <div class="box-header with-border" >
                      <h3 class="box-title">Инциденты не найден</h3>
                    </div>
                   
                    <!-- /.box-body -->
                  </div>
                  @endforelse
                
                </div>
                <div class="column">
                  @forelse ($onlyInWork as $work)
                  <div class="box" style="border-top: 3px solid yellow;">
                    <div class="box-header with-border" >
                      <h3 class="box-title"><a href="{{ route('system.admin.incidents.edit', $work->id)}}">{{ $work->title }}</a></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      {{ $work->description }}
                    </div>
                    <!-- /.box-body -->
                  </div>
                  @empty
                  <div class="box box-default" style="border-top: 3px solid yellow;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Инциденты не найден</h3>
                    </div>
                  </div>  
                  @endforelse
                  {{-- <div class="box" style="border-top: 3px solid yellow;">
                    <div class="box-header with-border" >
                      <h3 class="box-title">Expandable</h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      The body of the box
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <div class="box" style="border-top: 3px solid yellow;">
                    <div class="box-header with-border" >
                      <h3 class="box-title">Expandable</h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      The body of the box
                    </div>
                    <!-- /.box-body -->
                  </div> --}}
                  
                </div>
                <div class="column">
                  @forelse ($onlyDone as $done)
                  <div class="box box-default" style="border-top: 3px solid green;">
                    <div class="box-header with-border">
                      <h3 class="box-title"><a href="{{ route('system.admin.incidents.edit', $done->id)}}">{{ $done->title }}</a></h3>

                      {{-- <h3 class="box-title">{{ $done->title }}</h3> --}}
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      {{ $done->description }}
                    </div>
                    <!-- /.box-body -->
                  </div> 
                  @empty
                  <div class="box box-default" style="border-top: 3px solid green;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Инциденты не найден</h3>
                    </div>
                  </div>  
                  @endforelse
                  {{-- <div class="box box-default" style="border-top: 3px solid blue;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Expandable</h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      The body of the box
                    </div>
                    <!-- /.box-body -->
                  </div> --}}
                </div>
                <div class="column">
                  @forelse ($onlyConfirmed as $cormirmed)
                  <div class="box" style="border-top: 3px solid blue;">
                    <div class="box-header with-border" >
                      <h3 class="box-title"><a href="{{ route('system.admin.incidents.edit', $cormirmed->id)}}">{{ $cormirmed->title }}</a></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      {{ $cormirmed->description }}
                    </div>
                    <!-- /.box-body -->
                  </div>
                  @empty
                  <div class="box box-default" style="border-top: 3px solid blue;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Инциденты не найден</h3>
                    </div>
                  </div>  
                  @endforelse
                  {{-- <div class="box" style="border-top: 3px solid yellow;">
                    <div class="box-header with-border" >
                      <h3 class="box-title">Expandable</h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      The body of the box
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <div class="box" style="border-top: 3px solid yellow;">
                    <div class="box-header with-border" >
                      <h3 class="box-title">Expandable</h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      The body of the box
                    </div>
                    <!-- /.box-body -->
                  </div> --}}
                  
                </div>
                
              </div>

        </div>

    </section>

                            


@endsection
