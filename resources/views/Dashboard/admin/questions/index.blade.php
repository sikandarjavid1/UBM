@extends('Dashboard.admin.layouts.admin-dash')

@section('content')

    {{-- Add Modal --}}
    <div class="modal fade" id="AddQuestionModal" tabindex="-1" aria-labelledby="AddQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddQuestionModalLabel">Add Question of Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="save_msgList"></ul>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" name="" id="category_id">
                            <option hidden>Choose Category</option>
                            @foreach ($question_category as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Question Number</label>
                        <input type="text" required class="question_no form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Question</label>
                        <input type="text" required class="question form-control">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_question">Save</button>
                </div>

            </div>
        </div>
    </div>



    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update Questions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="q_id" />
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" name="" id="category_id_edit">
                            <option hidden>Choose Category</option>
                            @foreach ($question_category as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Question Number</label>
                        <input type="text" required id="question_no" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Question</label>
                        <input type="text" id="question" required class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_question">Update</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_question">Yes Delete</button>
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
                                    data-bs-target="#AddQuestionModal">Add Questions</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Question Category</th>
                                <th>Question</th>
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

            fetchquestions();
                var count =1;
            function fetchquestions() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_questions",
                    dataType: "json",
                    success: function (response) {

                        $('tbody').html("");
                        $.each(response.questions, function (key, item) {

                            $('tbody').append('<tr>\
                            <td>' + count + '</td>\
                            <td>' + item.category.category_name+'-'+item.question_number + '</td>\
                            <td>' + item.question + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                            count++;
                        });
                    }
                });
            }

            $(document).on('click', '.add_question', function (e) {
                e.preventDefault();

                $(this).text('Sending..');
                var question  = $('.question').val();
                var cat_id = $('#category_id').val();
                var q_no = $('.question_no').val();

                var data = {
                    'question': question,
                    'category_id':cat_id,
                    'question_number':q_no,

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/questions",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_question').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddQuestionModal').find('input').val('');
                            $('.add_question').text('Save');
                            $('#AddQuestionModal').modal('hide');
                            fetchquestions();
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var q_id = $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-questions/" + q_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            $('#question').val(response.que.question);
                         $('#category_id_edit').val(response.que.category_id);
                            $('#question_no').val(response.que.question_number);




                            $('#q_id').val(q_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_question', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#q_id').val();
                var question  = $('#question').val();
                var cat_id = $('#category_id_edit').val();
                var q_no = $('#question_no').val();


                var data = {
                    'question': question,
                    'category_id': cat_id,
                    'question_number':q_no,

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-question/" + id,
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
                            $('.update_question').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_question').text('Update');
                            $('#editModal').modal('hide');
                            fetchquestions();
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var q_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(q_id);
            });

            $(document).on('click', '.delete_question', function (e) {
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
                    url: "/delete-question/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_question').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_question').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchquestions();
                        }
                    }
                });
            });

        });
    </script>

@endsection

