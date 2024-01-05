@include('admin.partials.header')
<!-- Left Sidebar End -->


<!-- Top Bar End -->

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Stajyerin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>Parola</th>
                            <th>Kayit Tarihi</th>
                            <th>Eylemler</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($AllUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ Str::limit($user->password, 10) }}</td>
                            <td>{{ $user->join_date }}</td>
                            <td>
                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="zoomIn" data-target="#myModal{{ $user->id }}"><i class="mdi mdi-pencil"></i></a>
                                <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                            </td>
                        </tr>

                        <div class="modal animation-modal fade" id="myModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel{{ $user->id }}">{{ $user->name }} Düzenleme Sayfası</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">İsim:</label>
                                                <input type="text" class="form-control" id="name" value="{{ $user->name }}">  
                                            </div>

                                            <!--- email -->
                                            
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input type="text" class="form-control" id="email" value="{{ $user->email }}">
                                            </div>

                                            <!--- password -->

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Parola:</label>
                                                <input type="text" class="form-control" id="password" value="{{ $user->password }}">
                                            </div>

                                            <!--parola tekrar-->
                                            
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Parola Tekrar:</label>
                                                <input type="text" class="form-control" id="re-password" value="{{ $user->password }}">
                                            </div>

                                            <!--- country -->

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ülke:</label>
                                                <select class="form-control" id="country"></select>
                                            </div>
                                            
                                           
                                            <!--- city -->

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Şehir:</label>
                                                <input type="text" class="form-control" id="city" value="{{ $user->city }}">
                                            </div>


                                            

                                            


                                        </form>
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        @endforeach

                    </tbody>
                </table>

            </div> <!-- end col -->
        </div> <!-- end row -->


        <!---modal start-->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                            
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "{{ route('api.countries') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var countryOptions = "";
                        for (var i = 0; i < data.data.length; i++) {
                            countryOptions += "<option value='" + data.data[i].name + "'>" + data.data[i].name + "</option>";
                        }
                        $("#country").html(countryOptions);
                    },
                    error: function(error) {
                        console.log('Hata:', error);
                    }
                });
            });
        </script>
      

        @include('admin.partials.footer')