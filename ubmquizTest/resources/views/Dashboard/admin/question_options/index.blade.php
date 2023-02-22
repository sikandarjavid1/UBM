@extends('Dashboard.admin.layouts.admin-dash')

@section('content')
@php($weight = [1,2,3,4,5,6,7,8,9,10])
    {{-- Add Modal --}}
    <div class="modal fade" id="AddOptionsModal" tabindex="-1" aria-labelledby="AddOptionsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddOptionsModalLabel">Add Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="save_msgList"></ul>
                    <div class="mb-1">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" name="" id="category_id">
                            <option hidden>Choose Category</option>
                            @foreach ($question_category as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="question" class="form-label">Questions</label>
                        <select class="form-control" name="" id="question_id">
                            <option hidden>Choose Question</option>
                            @foreach ($questions as $item)
                                <option value="{{ $item->id }}">{{ $item->question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Option 1</label>
                        <input type="text" required class="option1 form-control">
                    </div>
                    <div class="mb-1">
                        <label for="option1w" class="form-label">Weight</label>
                        <select class="form-control" name="" id="option1w">
                            <option hidden>Choose Weight</option>
                            @foreach ($weight as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-1">
                        <label for="">Option 2</label>
                        <input type="text" required class="option2 form-control">
                    </div>
                    <div class="mb-1">
                        <label for="option2w" class="form-label">Weight</label>
                        <select class="form-control" name="" id="option2w">
                            <option hidden>Choose Weight</option>
                            @foreach ($weight as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-1">
                        <label for="">Option 3</label>
                        <input type="text" required class="option3 form-control">
                    </div>
                    <div class="mb-1">
                        <label for="option3w" class="form-label">Weight</label>
                        <select class="form-control" name="" id="option3w">
                            <option hidden>Choose Weight</option>
                            @foreach ($weight as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-1">
                        <label for="">Option 4</label>
                        <input type="text" required class="option4 form-control">
                    </div>
                    <div class="mb-1">
                        <label for="option4w" class="form-label">Weight</label>
                        <select class="form-control" name="" id="option4w">
                            <option hidden>Choose Weight</option>
                            @foreach ($weight as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Option 5</label>
                        <input type="text" required class="option5 form-control">
                    </div>
                    <div class="mb-1">
                        <label for="option4w" class="form-label">Weight</label>
                        <select class="form-control" name="" id="option5w">
                            <option hidden>Choose Weight</option>
                            @foreach ($weight as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_options">Save</button>
                </div>

            </div>
        </div>
    </div>



    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="op_id" />
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <select class="form-control" name="" id="question_id_edit">
                            <option hidden>Choose Question</option>
                            @foreach ($questions as $item)
                                <option value="{{ $item->id }}">{{ $item->question }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">option</label>
                        <input type="text" id="option" required class="form-control">
                    </div>
                    <div class="mb-1">
                        <label for="optionedit" class="form-label">Weight</label>
                        <select class="form-control" name="" id="optionedit">
                            <option hidden>Choose Weight</option>
                            @foreach ($weight as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_option">Update</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Option</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Option ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_option">Yes Delete</button>
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
                            Questions
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#AddOptionsModal">Add options</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered " >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Question options</th>
                                <th>options weight</th>
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

            fetchoptions();

            function fetchoptions() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_options",
                    dataType: "json",
                    success: function (response) {

                        $('tbody').html("");
                        $.each(response.options, function (key, item) {

                            $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.question.question + '</td>\
                            <td>' + item.option+ '</td>\
                            \<td>' + item.weight+ '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.add_options', function (e) {
                e.preventDefault();

                $(this).text('Sending..');
                var q_id  = $('#question_id').val();
                var cat_id = $('#category_id').val();
                var option1 = $('.option1').val();
                var option1w = $('#option1w').val();
                var option2 = $('.option2').val();
                var option2w = $('#option2w').val();
                var option3 = $('.option3').val();
                var option3w = $('#option3w').val();
                var option4 = $('.option4').val();
                var option4w = $('#option4w').val();
                var option5 = $('.option5').val();
                var option5w = $('#option5w').val();

                var data = {
                    'question_id': q_id,
                    'option1':option1,
                    'weight1': option1w,
                    'option2':option2,
                    'weight2': option2w,
                    'option3':option3,
                    'weight3': option3w,
                    'option4':option4,
                    'weight4': option4w,
                    'option5':option5,
                    'weight5': option5w,
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/options",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_options').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddOptionsModal').find('input').val('');
                            $('.add_options').text('Save');
                            $('#AddOptionsModal').modal('hide');
                            fetchoptions();
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var op_id = $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-options/" + op_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            $('#question_id_edit').val(response.op.question_id);
                            $('#optionedit').val(response.op.weight);
                            $('#option').val(response.op.option);



                            $('#op_id').val(op_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_option', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#op_id').val();
                var question_id  = $('#question_id_edit').val();
                var weight = $('#optionedit').val();
                var option = $('#option').val();



                var data = {
                    'question_id': question_id,
                    'weight': weight,
                    'option':option,

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-options/" + id,
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
                            $('.update_option').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_option').text('Update');
                            $('#editModal').modal('hide');
                            fetchoptions();
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var op_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(op_id);
            });

            $(document).on('click', '.delete_option', function (e) {
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
                    url: "/delete-options/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_option').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_option').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchoptions();
                        }
                    }
                });
            });

        });
    </script>

@endsection

