@extends('auth.admin.master')

@section('title') {{'Insights'}} @endsection

@section('main')
<main>
    @if(isset($total))
    <div class="bank-banner">
        <img src="Insights.svg" alt="insights"/>
        <div class="bank-banner-bg">
            <h3>Blood bank managment</h3>
            <p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit</p><p>Lorem ipsum dolor sit Lorem ipsum.</p>
        </div>
        <span class="material-symbols-outlined">ecg_heart</span>
    </div>
    <h4>Blood bank levels</h4>
    <div class="row text-center mt-4 bg-light p-3 rounded-4">
        <div class="col-4 border-right">
            <div class="h4 font-weight-bold mb-0">{{$total}}</div><span class="small text-gray">Sacks in total</span>
        </div>
        <div class="col-4">
            <div class="h4 font-weight-bold mb-0">35%</div><span class="small text-gray">Last month</span>
        </div>
        <div class="col-4">
            <div class="h4 font-weight-bold mb-0">{{$total/400*100 }}%</div><span class="small text-gray">Last year</span>
        </div>
    </div>
    @endif
    @if(isset($bloodBank))
    <div class="pb-5">
    @foreach($bloodBank as $blood)
        @if($blood->category == 'blood')
            <div class="row text-center mt-4 mb-4">
                <div class="col-6 border-right">
                    <div class="h6 font-weight-bold mb-0">{{ $blood->symbol }}</div>
                </div>
                
                <div class="col-6 border-right">
                    <div class="h6 font-weight-bold mb-0">{{ $blood->qty/50*100 }}%</div>
                </div>
            </div>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $blood->qty/100*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $blood->qty }}</div>
            </div>
        @endif
    @endforeach
    </div>
    <h4>Platelet bank levels</h4>
    <div class="row text-center mt-4 bg-light p-3 rounded-4">
        <div class="col-4 border-right">
            <div class="h4 font-weight-bold mb-0">{{$total}}</div><span class="small text-gray">Sacks in total</span>
        </div>
        <div class="col-4">
            <div class="h4 font-weight-bold mb-0">12%</div><span class="small text-gray">Last month</span>
        </div>
        <div class="col-4">
            <div class="h4 font-weight-bold mb-0">{{$total/400*100 }}%</div><span class="small text-gray">Last year</span>
        </div>
    </div>
    <div class="pb-3">
    @foreach($bloodBank as $blood)
        @if($blood->category == 'platelet')
            <div class="row text-center mt-4 mb-4">
                <div class="col-6 border-right">
                    <div class="h6 font-weight-bold mb-0">{{ $blood->symbol }}</div>
                </div>
                
                <div class="col-6 border-right">
                    <div class="h6 font-weight-bold mb-0">{{ $blood->qty/50*100 }}%</div>
                </div>
            </div>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $blood->qty/50*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $blood->qty }}</div>
            </div>
        @endif
    @endforeach
    </div>

    @endif
</main>
@endsection('main')