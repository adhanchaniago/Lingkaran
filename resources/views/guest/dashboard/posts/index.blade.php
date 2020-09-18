@extends('guest.layouts.dashboard')
@section('page')
<nav>
    <div class="nav nav-fill nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-myposts-tab" data-toggle="tab" href="#nav-myposts" role="tab"
            aria-controls="nav-myposts" aria-selected="true">My Posts
        </a>
        <a class="nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab"
            aria-controls="nav-pending" aria-selected="false">Pending
        </a>
        <a class="nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-rejected" role="tab"
            aria-controls="nav-rejected" aria-selected="false">Rejected
        </a>
        <a class="nav-link" id="nav-published-tab" data-toggle="tab" href="#nav-published" role="tab"
            aria-controls="nav-published" aria-selected="false">Published
        </a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-myposts" role="tabpanel" aria-labelledby="nav-myposts-tab">
        Disini tab post


        <nav aria-label="...">
            <ul class="pagination pagination-sm mt-5">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
        Disini tab pending

        <nav aria-label="...">
            <ul class="pagination pagination-sm mt-5">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">
        Disini tab rejected

        <nav aria-label="...">
            <ul class="pagination pagination-sm mt-5">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="tab-pane fade" id="nav-published" role="tabpanel" aria-labelledby="nav-published-tab">
        Disini tab published

        <nav aria-label="...">
            <ul class="pagination pagination-sm mt-5">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection