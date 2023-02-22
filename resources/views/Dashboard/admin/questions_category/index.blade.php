@extends('Dashboard.admin.layouts.admin-dash')

@section('content')

    {{-- Add Modal --}}
    <div class="modal fade" id="AddCategoryModal" tabindex="-1" aria-labelledby="AddCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddCategoryModalLabel">Add Category of Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="">Category Name</label>
                        <input type="text" required class="category_name form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_Category">Save</button>
                </div>

            </div>
        </div>
    </div>


    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="cat_id" />

                    <div class="form-group mb-3">
                        <label for="">Category Name</label>
                        <input type="text" id="category" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_category">Update</button>
                </div>

            </div>
        </div>
    </div>
    {{-- Edn- Edit Modal --}}


    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Quiz Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_category">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Quiz Category
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#AddCategoryModal">Add Category</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            fetchstudent();

            function fetchstudent() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_category",
                    dataType: "json",
                    success: function (response) {

                        $('tbody').html("");
                        $.each(response.question_category, function (key, item) {

                            $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.category_name + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.add_Category', function (e) {
                e.preventDefault();

                 $(this).text('Sending..');
                var data1 = $('.category_name').val();
                alert(data1);
                var data = {
                    'category_name': $('.category_name').val(),

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/question_category",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_Category').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddCategoryModal').find('input').val('');
                            $('.add_Category').text('Save');
                            $('#AddCategoryModalModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var cat_id = $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-category/" + cat_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.name);
                            //alert(response.q_cat.category_name);
                            $('#category').val(response.q_cat.category_name);
                            $('#cat_id').val(cat_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_category', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#cat_id').val();
                // alert(id);

                var data = {
                    'category_name': $('#category').val(),

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-category/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_category').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_category').text('Update');
                            $('#editModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var cat_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(cat_id);
            });

            $(document).on('click', '.delete_category', function (e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-category/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_category').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_category').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });
            });

        });

    </script>

@endsection
