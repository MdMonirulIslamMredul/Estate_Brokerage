@extends('frontend.layout')
@section('content') 
 
 <!-- Content -->
 <div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url({{ asset($banner->banner_image) }})">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Membership List</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>MemberList</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="section-full content-inner">
        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="section-head text-center ">
                    <h2 class="h2"><span class="text-primary">Our Honurable Members</span></h2>
                   
                  
                </div>
                @foreach($members as $item)
                <div class="col-md-6 col-sm-6 m-b30">

                    <table  border="1">
                        <tr>
                            <td style="text-align: center"><b>{{ $item->name_english }}</b></td>
                            <td><b>Emal</b></td>
                            <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <td rowspan="5" style="width:250px;height:220px; border: 1px solid #ddd;
                            border-radius: 4px;
                            padding: 5px;" ><img src="{{ asset($item->image) }}"  alt="image"></td>
                            <td><b>Phone</b></td>
                            <td>{{ $item->phone }}</td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td>{{ $item->address_eng }}</td>
                        </tr>
                        <tr>
                            <td><b>Occupation</b></td>
                            <td>{{ $item->occupation }}</td>
                        </tr>
                        <tr>
                            <td><b>Father Name</b></td>
                            <td>{{ $item->fat_name_eng }}</td>
                        </tr>
                        <tr>
                            <td><b>Message</b></td>
                            <td>{{ $item->message_english }}</td>
                        </tr>
                    </table>

                   
                </div>
                @endforeach

                <div style="text-align: center">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
        <!-- Product END -->
    </div>
    <!-- contact area  END -->
</div>
<!-- Content END-->

@endsection