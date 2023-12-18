<x-app-layout>
    <x-slot name="title_page">
        <title>Event</title>
    </x-slot>  
    <!-- content @s -->
    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h2>{{$event->title}}</h2>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="">
            <div class="col-md-12 col-sm-12  ">
                <h4>{{$event->text}}</h4>
                <h4>{{$event->created_at->format('d-m-Y H:i')}}</h4>
            </div>
            <div class="clearfix"></div>


            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h4><i class="fa fa-align-left"></i>Участники</h4>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- start accordion -->
                  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($event->participants as $user)
                    <div class="panel">
                      <a class="panel-heading collapsed" role="tab" id="heading{{$user->id}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$user->id}}" aria-expanded="false" aria-controls="collapse{{$user->id}}">
                        <h4 class="panel-title">{{$user->first_name}} {{$user->last_name}}</h4>
                      </a>
                      <div id="collapse{{$user->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$user->id}}">
                        <div class="panel-body">
                          <p><strong>День рождения{{$user->birthday?->format('d-m-Y')}}</strong>
                          </p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- end of accordion -->


                </div>
              </div>
            </div>


            @if ($event->participants->contains(Auth::user()))
                <a href="{{route('event.cancelParticipate', $event)}}">
                    <button type="submit" class="btn btn-danger">Отказаться от участия</button>
                </a>
            @else 
                <a href="{{route('event.addParticipate', $event)}}">
                    <button type="submit" class="btn btn-success">Принять участие</button>
                </a>
            @endif
          

          </div>
       

        </div>
        <div class="clearfix"></div>
      </div>
    <!-- content @e -->


</x-app-layout>
