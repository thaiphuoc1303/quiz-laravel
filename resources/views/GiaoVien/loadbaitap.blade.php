
<div id="removeshow">
    <div style="right:20px; position: fixed">
        <button onclick="removeshowbaitap()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="card-header">

    </div>
    <div class="card-body">
        <div class="row card bg-success">{!! $baitap->de !!}</div>
        <div class="row">
            <div class="card col-md-6">{!! $baitap->DaA !!}</div>
            <div class="card col-md-6">{!! $baitap->DaB !!}</div>
            <div class="card col-md-6">{!! $baitap->DaC !!}</div>
            <div class="card col-md-6">{!! $baitap->DaD !!}</div>
        </div>
    </div>
</div>
{{-- <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script> --}}