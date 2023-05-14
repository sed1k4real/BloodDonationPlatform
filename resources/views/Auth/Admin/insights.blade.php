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
            <div class="h4 font-weight-bold mb-0">{{$total}}</div><span class="small text-gray">in total</span>
        </div>
        <div class="col-4">
            <div class="h4 font-weight-bold mb-0">40%</div><span class="small text-gray">Last month</span>
        </div>
        <div class="col-4">
            <div class="h4 font-weight-bold mb-0">{{$total/400*100 }}%</div><span class="small text-gray">Last year</span>
        </div>
    </div>
    @endif
    @if(isset($bloodBank))
    <div>
    @foreach($bloodBank as $blood)
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
        @endforeach
    </div>

    @endif
</main>
@endsection('main')