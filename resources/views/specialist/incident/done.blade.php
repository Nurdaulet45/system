@extends('layouts.app_admin')

@section('content')
    <section class="content">
        {{-- Small boxes (Stat box) --}}
        <div class="box-body">
          @include('include\result_messages')
              {{-- <div class="row">
                <div class="col-lg-4 col-xs-6" style="float: left;">
                    <div class="box" style="width:100%">
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-responsive  table-hover">
                            <tbody><tr>
                              <th>Выявленные инциденты</th>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                </div>
                <div class="col-lg-4 col-xs-6" style="float: left;">
                    <div class="box" style="width:100%">
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-responsive  table-hover">
                            <tbody><tr>
                              <th>В работе</th>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                </div>
                <div class="col-lg-4 col-xs-6" style="float: left;">

                    <div class="box" style="width:100%">
                      
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-responsive  table-hover">
                            <tbody><tr>
                              <th>Выполнено</th>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                </div>
              </div> --}}

              <div class="row">
         @forelse ($incidents as $incident)
         <div class="box" style="width: 30%; margin:10px">
          <div class="box-header with-border" >
          <h3 class="box-title"><a href="{{ route('system.specialist.incidents.view', $incident->id)}}"> {{ $incident->title }}</a></h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            {{ $incident->description}}
          </div>
          <!-- /.box-body -->
      </div>
         @empty
         <div class="box" style="width: 30%; margin:10px">
          <div class="box-header with-border" >
            <h3 class="box-title">Инциденты не найден</h3>
          </div>
      </div>
         @endforelse
            {{-- <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box" style="width: 30%; margin:10px">
                <div class="box-header with-border" >
                <h3 class="box-title"><a href="{{ route('system.admin.incidents.specView')}}"> Expandable</a></h3>
    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  The body of the box
                </div>
                <!-- /.box-body -->
            </div> --}}
            
        </div>
        <div class="text-center">
          <p>{{ count($incidents) }} инцидентов из {{ $countIncidents }}</p>

          @if ($incidents->total() > $incidents->count())
              <br>
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                              {{ $incidents->links() }}
                          </div>
                      </div>
                  </div>
              </div>
          @endif
      </div>
    </div>

    </section>

                            


@endsection
