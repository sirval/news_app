@extends('layouts.app-master')

@section('content')
<div id="layoutSidenav_content">
    <main>
        @auth
        
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Total News</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Trending News</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">This Week Total</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Last Week Total</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        List of News
                    </div><br>
                    <div style="margin-left: 15px" class="col-xl-3 col-md-6">
                        <a class="btn btn-primary btn-sm" href="/admin/create/news">New News</a>
                    </div>
                    <div class="card-body">
                        @include('layouts.partials.messages')
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="40%">Title</th>
                                    
                                    <th width="20%">Created</th>
                                    <th width="30%">Action</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                @php
                                   $sn = 1 
                                @endphp
                                 
                                @forelse($allNews as $news)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ ucfirst($news->title) }}</td>
                                    
                                    <td>{{ $news->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="./admin/{{ $news->id }}">View</a>
                                        <a class="btn btn-primary btn-sm" href="./admin/{{ $news->id }}/edit">Edit</a>
                                        {{-- <a class="btn btn-danger btn-sm" href="javascript:;" data-toggle="modal" data-id='{{$news->id}}' data-target="#exampleModalCenter" >Delete</a>
   --}}
                                        <form id="delete-frm" action="{{ route('admin.destroy', $news->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf  
                                            <button type="submit" class="btn btn-sm btn-danger " data-toggle="confirmation" title='Delete'>Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                
    
                                @empty
                                
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endauth

            @guest
            <br><br><br><br>
            <div style="text-align: center">
            <h1>Homepage</h1><br>
            <h4 class="">Your are trying to view a restricted page. Please <a href="../login">LOGIN</a> to view page or click <a href="../news">Here</a> to read todays trending news</h4>
            </div>
            @endguest
        </div>
    </main>
</div>
</div>

<script>
    window.onload = function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
        });
    }
</script>                   

@endsection
