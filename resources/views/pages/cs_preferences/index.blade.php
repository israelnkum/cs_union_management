@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row profile-page">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-header text-white">
                            <div class="d-md-flex justify-content-around">
                                <div class="profile-info d-flex align-items-center">
                                    <img class="rounded-circle img-lg" src="{{asset('img/itsu.jpeg')}}" alt="profile image">
                                    <div class="wrapper pl-4">
                                        <p class="profile-user-name">Richard V.Welsh (UI/UX Designer)</p>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="detail-col">
                                        <p>Students</p>
                                        <p>130</p>
                                    </div>
                                    <div class="detail-col">
                                        <p>Lectures</p>
                                        <p>130</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-body">
                            <ul class="nav tab-switch" id="" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="store-info-tab" data-toggle="pill" href="#store-info" role="tab" aria-controls="store-info" aria-selected="true">Department</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="level-tab" data-toggle="pill" href="#levels" role="tab" aria-controls="levels" aria-selected="false">Levels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="souvenirs-tab" data-toggle="pill" href="#souvenirs" role="tab" aria-controls="souvenirs" aria-selected="false">Souvenirs</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="store-location-tab" data-toggle="pill" href="#store-location" role="tab" aria-controls="store-location-tab" aria-selected="false">Store Locations</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="receipt-tab" data-toggle="pill" href="#receipt" role="tab" aria-controls="receipt-tab" aria-selected="false">Receipt</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="invoice-tab" data-toggle="pill" href="#invoice" role="tab" aria-controls="invoice-tab" aria-selected="false">Invoice</a>
                                </li>

                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content tab-body" id="profile-log-switch">
                                        <div class="tab-pane fade show active pr-3" id="store-info" role="tabpanel" aria-labelledby="store-info-tab">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input id="department_name" placeholder="Department Name" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <div class="col-md-12">
                                                                <input id="motto" placeholder="Motto" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row mt-3">
                                                            <div class="col-md-4">
                                                                <div class="picture-container">
                                                                    <div class="picture">
                                                                        <img src="{{asset('img/itsu.jpeg')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                                        <input required  type="file" class="form-control" name="image_file"   id="wizard-picture">
                                                                    </div>
                                                                    <h6>Choose Logo</h6>
                                                                    <small class="text-danger">
                                                                        Max Size - 500KB
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="levels" role="tabpanel" aria-labelledby="levels-tab">
                                            <div class="row">
                                                <div class="col-md-8">

                                                    <div class="card-body">
                                                        <form action="{{route('bulk_delete')}}" id="bulkDeleteForm" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6"> <h3 class="card-title">All Levels</h3></div>
                                                                <div class="col-md-6 text-right">
                                                                    <button type="button" id="deleteSelected" disabled class="btn btn-danger" data-toggle="modal" data-target="#confrimBulkDelete">
                                                                        Delete Selected
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 table-responsive">
                                                                <table id="levels_table" class="table table-hover">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <label class="form-check-label">
                                                                                <input id="checkAll" title="Select All" type="checkbox" >
                                                                            </label>
                                                                        </th>
                                                                        <th>ID</th>
                                                                        <th>Level Name</th>
                                                                        <th>Dues Amount</th>
                                                                        <th>S_id</th>
                                                                        <th>Souvenirs</th>
                                                                        <th>Souvenir Amount</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($levels as $level)
                                                                        <tr>
                                                                            <td>
                                                                                <input title="Select"  type="checkbox" value="{{$level->id}}" name="selected_id[]">
                                                                            </td>
                                                                            <td>{{$level->id}}</td>
                                                                            <td>{{$level->name}}</td>
                                                                            <td>{{$level->duesAmount}}</td>
                                                                            <td>
                                                                                @php
                                                                                    $eligible =$level->eligible;
                                                                                foreach ($eligible as $value){
                                                                                echo $value->souvenir_id.",";
                                                                                }
                                                                                @endphp
                                                                            </td>
                                                                            <td>
                                                                                @php
                                                                                    $eligible =$level->eligible;
                                                                                foreach ($eligible as $value){
                                                                                echo $value->souvenir_name.", ";
                                                                                }
                                                                                @endphp
                                                                            </td>
                                                                            <td>{{$level->souvenirAmount}}</td>
                                                                            <td>
                                                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                                                    <button type="button"  class="btn btn-default p-1 edit">
                                                                                        <i class="icon icon-note"></i>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-default delete p-1">
                                                                                        <i class="icon icon-trash"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">New Level</h3>
                                                            <form class="needs-validation" novalidate method="POST" action="{{route('levels.store')}}">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <input type="text" required name="levelName" placeholder="Level Name" class="form-control">
                                                                    <div class="invalid-feedback">
                                                                        Level Name required
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <input type="number" required name="duesAmount" placeholder="Dues Amount"  class="form-control">
                                                                    <div class="invalid-feedback">
                                                                        Dues Amount required
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <input type="number" required name="souvenirAmount" placeholder="Souvenir Amount"  class="form-control">
                                                                    <div class="invalid-feedback">
                                                                        Souvenir Amount required
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label>Select Souvenir(s)</label>
                                                                        <select title="Souvenir"  style="width: 100%" name="souvenirs[]" class="js-example-basic-multiple w-100" multiple="multiple">
                                                                            @foreach($souvenirs as $souvenir)
                                                                                <option value="{{$souvenir->id.",".$souvenir->name}}">{{$souvenir->name}}</option>
                                                                            @endforeach
                                                                        </select>

                                                                        <small class="text-danger">Leave this empty if level is not entitled to any souvenir</small>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-outline-primary" type="submit">Add Level</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--Souvenirs TAb--}}
                                        <div class="tab-pane fade" id="souvenirs" role="tabpanel" aria-labelledby="souvenirs-tab">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <form action="{{route('bulk_delete')}}" id="bulkDeleteForm" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6"> <h3 class="card-title">All Souvenirs</h3></div>
                                                                <div class="col-md-6 text-right">
                                                                    <button type="button" id="deleteSelected" disabled class="btn btn-danger" data-toggle="modal" data-target="#confrimBulkDelete">
                                                                        Delete Selected
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 table-responsive">
                                                                <table id="levels_table" class="table table-hover">
                                                                    <thead>
                                                                    <tr>
                                                                        <th><input id="checkAll" title="Select All" type="checkbox" ></th>
                                                                        <th>ID</th>
                                                                        <th>Amount Paying</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($souvenirs as $souvenir)
                                                                        <tr>
                                                                            <td>
                                                                                <input title="Select" type="checkbox" value="{{$souvenir->id}}" name="selected_id[]" class="checkItem">
                                                                            </td>
                                                                            <td>{{$souvenir->id}}</td>
                                                                            <td>{{$souvenir->name}}</td>
                                                                            <td>
                                                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                                                    <button role="button" href="javascript:void(0)" class="btn btn-default p-1 edit">
                                                                                        <i class="icon icon-note"></i>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-default delete p-1">
                                                                                        <i class="icon icon-trash"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">New Souvenirs</h3>
                                                            <form class="needs-validation" novalidate method="POST" action="{{route('souvenirs.store')}}">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <input type="text" required name="souvenir_name" placeholder="Souvenir Name"  class="form-control">
                                                                    <div class="invalid-feedback">
                                                                        Amount required
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    {{--<select title="Select Level" id="level_id" name="level_id" style="width: 100%;" class="form-control select2 js-example-basic-single" required>
                                                                        <option value="">Select Level</option>
                                                                        @foreach($levels as $level)
                                                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select Level
                                                                    </div>--}}
                                                                </div>
                                                                <button class="btn btn-outline-primary" type="submit">Add Level</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--End Souvenirs TAb--}}
                                        <div class="tab-pane fade" id="store-location" role="tabpanel" aria-labelledby="store-location-tab">
                                            <div class="horizontal-timeline">
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">store Location</h4>
                                                    <div class="event">
                                                        <p class="event-text">We’re big on real names around here, so people know who’s who</p>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 9:24 PM</div>
                                                    </div>

                                                </section>
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">Yesterday</h4>
                                                    <div class="event">
                                                        <p class="event-text">Night fill together itself. Midst. Beginning. Behold living god had.</p>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 11:24 PM</div>
                                                    </div>
                                                    <div class="event">
                                                        <p class="event-text">Why waste time starting from scratch; try out our admin dashboard template</p>
                                                        <div class="event-info">New Dashboard Design - 11:30 PM</div>
                                                    </div>
                                                </section>
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">30 March</h4>
                                                    <div class="event">
                                                        <p class="event-text">Gerald Vaughn changed the status to QA on MA-86 - Retargeting Ads</p>
                                                        <div class="tumbnail-views">
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/07.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/08.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/09.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/10.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/11.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/12.jpg" alt="thumbnail"></div>
                                                        </div>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 11:45 PM</div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="receipt" role="tabpanel" aria-labelledby="receipt-tab">
                                            <div class="horizontal-timeline">
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">receipt</h4>
                                                    <div class="event">
                                                        <p class="event-text">We’re big on real names around here, so people know who’s who</p>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 9:24 PM</div>
                                                    </div>

                                                </section>
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">Yesterday</h4>
                                                    <div class="event">
                                                        <p class="event-text">Night fill together itself. Midst. Beginning. Behold living god had.</p>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 11:24 PM</div>
                                                    </div>
                                                    <div class="event">
                                                        <p class="event-text">Why waste time starting from scratch; try out our admin dashboard template</p>
                                                        <div class="event-info">New Dashboard Design - 11:30 PM</div>
                                                    </div>
                                                </section>
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">30 March</h4>
                                                    <div class="event">
                                                        <p class="event-text">Gerald Vaughn changed the status to QA on MA-86 - Retargeting Ads</p>
                                                        <div class="tumbnail-views">
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/07.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/08.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/09.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/10.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/11.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/12.jpg" alt="thumbnail"></div>
                                                        </div>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 11:45 PM</div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                            <div class="horizontal-timeline">
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">invoice</h4>
                                                    <div class="event">
                                                        <p class="event-text">We’re big on real names around here, so people know who’s who</p>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 9:24 PM</div>
                                                    </div>

                                                </section>
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">Yesterday</h4>
                                                    <div class="event">
                                                        <p class="event-text">Night fill together itself. Midst. Beginning. Behold living god had.</p>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 11:24 PM</div>
                                                    </div>
                                                    <div class="event">
                                                        <p class="event-text">Why waste time starting from scratch; try out our admin dashboard template</p>
                                                        <div class="event-info">New Dashboard Design - 11:30 PM</div>
                                                    </div>
                                                </section>
                                                <section class="time-frame">
                                                    <h4 class="section-time-frame">30 March</h4>
                                                    <div class="event">
                                                        <p class="event-text">Gerald Vaughn changed the status to QA on MA-86 - Retargeting Ads</p>
                                                        <div class="tumbnail-views">
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/07.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/08.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/09.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/10.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/11.jpg" alt="thumbnail"></div>
                                                            <div class="thumbnail"><img src="../../images/samples/profile_page/thumbnail/12.jpg" alt="thumbnail"></div>
                                                        </div>
                                                        <div class="event-alert">You have added task #26 Successfully to the project “Agile CRM”</div>
                                                        <div class="event-info">New Dashboard Design - 11:45 PM</div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--Edit Level modal--}}
    <div class="modal fade"  id="editLevelModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="needs-validation" id="editLevelForm" novalidate method="post" action="/levels">
                @csrf
                {{method_field('put')}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="editLevelTitle">Edit Level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input title="Level Name" id="level_name" class="form-control" required name="levelName" type="text">
                                    <div class="invalid-feedback">
                                        Please enter level name
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input title="Dues Amount" id="duesAmount" placeholder="Dues Amount" class="form-control" required name="duesAmount" type="number">
                                    <div class="invalid-feedback">
                                        Please enter amount
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input title="Souvenir Amount" id="souvenirAmount" placeholder="Souvenir Amount" class="form-control" required name="souvenirAmount" type="number">
                                    <div class="invalid-feedback">
                                        Please enter amount
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Select Souvenir(s)</label>
                                    <select title="Souvenir" id="edit_souvenirs" style="width: 100%" name="souvenirs[]" class="js-example-basic-multiple w-100" multiple="multiple">
                                        @foreach($souvenirs as $souvenir)
                                            <option value="{{$souvenir->id}}">{{$souvenir->name}}</option>
                                        @endforeach
                                    </select>

                                    {{--<small class="text-danger">Leave this empty if level is not entitled to any souvenir</small>--}}
                                </div>

                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="icon icon-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="icon icon-plus"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--End edit Level modal--}}


    {{--Start delete level modal--}}
    <div class="modal fade"  id="deleteLevelModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="needs-validation" id="deleteLevelForm" novalidate method="post" action="/levels">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deleteCategoryTitle">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="pt-0 pb-0">Are you sure you want to delete <span id="deleteCategoryItem" class="text-danger"></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="icon icon-close"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="icon icon-trash"></i>Yes! Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--End delete level modal--}}


    <!-- Modal -->
    <div class="modal fade" id="confrimBulkDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection