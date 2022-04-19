@extends('layout')
@section('content')
        <!-- @php
            echo "<pre>";
            var_dump($doctorList);
        @endphp -->

    <div class="card">
            <div class="card-header">
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
                    @endif


                    <a href="javascript:void(0)" class="btn btn-outline-primary float-right" id="add_doctor" title="Add Doctor"><i class="fa fa-plus fa-xs" aria-hidden="true"></i></a>

           </div>
        <article class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="doctor">
                    <thead>
                        <tr  class="table-secondary">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                             <!-- <th>Degree</th>
                            <th>City</th>
                            <th>Location</th> -->
                            <th>Specialization</th>
                            <!-- <th>Rate</th>
                            <th>Center Fees</th>
                            <th>MHM Fees</th> -->
                            <!--<th>Plan Code</th>
                            <th>Address</th> -->
                            <th>Experience</th>
                            <!-- <th>Slot timing</th> -->
                            <!-- <th>Registered On</th> -->
                            <!-- <th>status</th> -->
                            <!-- <th>Is Active</th> -->
                        </tr>
                    </thead>
                    <tbody>
                @foreach($doctorList as $list)
                        <tr>
                            <td>{{$list->doc_name}}</td>
                            <td>{{$list->doc_email}}</td>
                            <td>{{$list->doc_contact}}</td>
                            <!--<td>{{$list->doc_degree}}</td>
                             <td>{{$list->doc_city}}</td>
                            <td>{{$list->doc_location}}</td> -->
                            <td>{{$list->doc_specialization}}</td>
                            <!-- <td>{{$list->rack_rate}}</td>
                            <td>{{$list->center_fees}}</td>
                            <td>{{$list->mhm_fees}}</td> -->
                            <!-- <td>{{$list->plan_code}}</td>
                            <td>{{$list->doc_address}}</td> -->
                            <td>{{$list->doc_experience}}</td>
                            <!-- <td>{{$list->doc_slot_timing}}</td> -->
                            <!-- <td>{{$list->registered_on}}</td> -->
                            <!-- <td>{{$list->status}}</td> -->
                            <!-- <td>{{$list->is_active}}</td> -->
                        </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </article>
    </div>
    <div class="modal" tabindex="-1" id="adddoctr">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close btn-cancel" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="" method="post">
               <div class="container">
                  
                    <div class="col-lg-12 well">
                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Name</label>
                                                <input type="text" placeholder="Enter Name Here.." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Email</label>
                                                <input type="text" placeholder="Enter Email Name Here.." class="form-control">
                                            </div>
                                        </div>					
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                        </div>	
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>Rack Rate (Optional)</label>
                                                <input type="text" placeholder="Rack Rate Here.." class="form-control">
                                            </div>	
                                            <div class="col-sm-4 form-group">
                                                <label>Center Fees</label>
                                                <input type="text" placeholder="Enter Center Fees Here.." class="form-control">
                                            </div>	
                                            <div class="col-sm-4 form-group">
                                                <label>MHM Fees</label>
                                                <input type="text" placeholder="Enter MHM Fees Here.." class="form-control">
                                            </div>		
                                        </div>
                                      		
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" placeholder="Enter Contact Number Here.." class="form-control">
                                    </div>		
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" placeholder="Enter Email Address Here.." class="form-control">
                                    </div>	
                                   
                                 
                                </div>
                    </div>
                    </div>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){

        $('#add_doctor').on('click',function(){
            $('.modal-title').text('Add Doctor');
            $('#adddoctr').modal('show');
        });

     var table = $('#doctor').DataTable( {
                dom: 'Bfrtip',
                "info": false,
                buttons: [
                    {
                        extend: 'csv',
                        className: 'btn btn-primary btn-xs',
                        text: '<i class="fa fa-file-excel" aria-hidden="true"></i>',
                        titleAttr: 'csv download'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-primary btn-xs',
                        text: '<i class="fa fa-file-excel" aria-hidden="true"></i>',
                        titleAttr: 'excel download'
                    },
                    {
                        extend: 'pdf',
                        title: 'Monthly Report',
                        className: 'btn btn-primary btn-xs',
                        text: '<i class="fa fa-file-pdf" aria-hidden="true"></i>',
                        titleAttr: 'pdf download'
                        // exportOptions: {
                        //         columns: [ 0, 1, 2, 3, 4, 5 ]
                        //     }
                    },
                     {
                        extend: 'print',
                        title: 'All Doctors List',
                        className: 'btn btn-primary btn-xs',
                        // exportOptions: {
                        //         columns: [ 0, 1, 2, 3, 4, 5 ]
                        //     }
                        text: '<i class="fa fa-print" aria-hidden="true"></i>',
                        columns: ':not(.select-checkbox)',
                        orientation: 'landscape',
                        titleAttr: 'print'

                     }


                ],

                "pageLength": 50
                } );
            });
</script>
@endsection