@extends('Administrator.layouts.sidebar')

@section('contentDashboard')

    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Users</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">

								    <form class="table-search-form row gx-1 align-items-center" action="{{ route('admin.users.search') }}" method="post" enctype="multipart/form-data">
									@csrf
					                    <div class="col-auto">
					                        <input type="text" name="word" id="search-orders"  class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button style="background-color: #fff; border: 1px solid #bcc1cb;" type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							    <div class="col-auto">
								    
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   

				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">User #</th>
												<th class="cell">Name</th>
												<th class="cell">Address</th>
												<th class="cell">Created at</th>
                                                <th class="cell">Role</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($users as $user)
											<tr>
												<td class="cell">{{$user->id}}</td>
												<td class="cell">{{ $user->first_name . ' '. $user->last_name}}</td>
												<td class="cell">{{ $user->purok . ', '. $user->barangay . ', '. $user->city}}</td>
                                                @if(is_null($user->created_at))
                                                    <td class="cell">n/a</td>
                                                @else
												    <td class="cell"><span class="cell-data">{{ date_format($user->created_at,"F d,Y") }}</span><span class="note">{{date_format($user->created_at,"g:i A")}}</span></td>
												@endif
                                                <td class="cell">
                                                @if($user->hasRole('superadministrator'))
                                                    <span class="badge bg-secondary">Admin</span>
                                                @elseif($user->hasRole('seller'))
                                                    <span class="badge bg-warning">Seller</span>
                                                @elseif($user->hasRole('customer'))
                                                    <span class="badge bg-info">Customer</span>
                                                @endif
                                                </td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('admin.view.user', $user->id) }}">View</a></td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
					
			        </div><!--//tab-pane-->

				</div><!--//tab-content-->
            

        </div>
    </div>


    




@endsection
