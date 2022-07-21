@extends('Administrator.layouts.sidebar')

@section('contentDashboard')

    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Cars</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">

								    <form class="table-search-form row gx-1 align-items-center" action="{{ route('admin.cars.search') }}" method="post" enctype="multipart/form-data">
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
												<th class="cell">Car#</th>
												<th class="cell">Car Title</th>
												<th class="cell">Seller Name</th>
												<th class="cell">Date Created</th>
												<th class="cell">Status</th>
												<th class="cell">Price</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
											@foreach($cars as $car)
											<tr>
												<td class="cell">{{$car->car_id}}</td>
												<td class="cell">{{$car->year_manufactured .' '.  $car->car_model_name . ' ' .$car->car_maker_name}}</td>
												<td class="cell">{{ $car->first_name . ' '. $car->last_name}}</td>
												<td class="cell"><span class="cell-data">{{ date_format($car->created_at,"F d,Y") }}</span><span class="note">{{date_format($car->created_at,"g:i A")}}</span></td>
												<td class="cell">
													@if($car->status == 'Active')
														<span class="badge bg-success">{{$car->status}}</span>
													@elseif($car->status == 'Deactive')
														<span class="badge bg-danger">{{$car->status}}</span>
													@endif
													@if($car->New_car )
														<span class="badge bg-info">New Car</span>
													@else
														<span class="badge bg-info">Used</span>
													@endif
												</td>
												<td class="cell">₱ {{$car->price}}</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('admin.view.car', $car->car_id) }}">View</a></td>
											</tr>
											@endforeach
											<!-- <tr>
												<td class="cell">#15346</td>
												<td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat erat</span></td>
												<td class="cell">John Sanders</td>
												<td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
												<td class="cell"><span class="badge bg-success">Paid</span></td>
												<td class="cell">$259.35</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
											</tr> -->

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
