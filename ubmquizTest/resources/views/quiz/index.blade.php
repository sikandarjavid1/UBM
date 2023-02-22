<!DOCTYPE html>
<html>

<head>
    <title>Universal Burnout Meter</title>
    <link href="dist/css/quiz.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

<main class="main">
    <div class="text-section">
        <p>
            This assessment is based on the world health organization (WHO)
            classification for Burnout-related symptoms released in 2019.
        </p>
    </div>
    <div class="container">
        <section class="quizbody">
            <div class="start_button">
                <button class="btn" id="mainButton">
                    Start
                    <span></span><span></span><span></span><span></span>
                </button>


            </div>
        </section>
        <Section class="questionbody">
            <div class="quiz_box">
                <header>
                    <div class="header_Wrapper">
                        <div class="logo">
                          <a href="/">  <img src="assests/images/Group 28.png" alt="logo-image" /></a>
                        </div>
                        <div class="total_que">
                            <span class="QNO"></span> /<span class="tQNO"></span>
                        </div>
                        <!-- <div class="quiz-progress" id="questCount"></div> -->
                    </div>
                </header>
                <div id="barra" class="progress">
                    <div id="bar" class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                </div>
                <input type="hidden" id="q_id" />
                <input type="hidden" id="cat1_id" />
                <input type="hidden" id="opt1_id" />
                <input type="hidden" id="opt2_id" />
                <input type="hidden" id="opt3_id" />
                <input type="hidden" id="opt4_id" />
                <input type="hidden" id="opt5_id" />


                <div class="quizbox-wrapper">
                    <p id="save_msg"></p>
                    <div class="quizbox">
                        <section class="qasection">
                            <div class="que_text">
                                How old am I?
                            </div>
                            <div class="option_list containerr">
                                <div class="option">
                                    <input type="radio" name="option" id="opt1" value="opt1input" required>
                                    <label for="opt1" aria-label="opt1">
                                        <span></span>
                                        option 1
                                    </label>
                                </div>
                                <div class="option">
                                    <input type="radio" name="option" id="opt2" value="opt1input" required>
                                    <label for="opt2" aria-label="opt2">
                                        <span></span>
                                        option 2
                                    </label>
                                </div>
                                <div class="option">
                                    <input type="radio" name="option" id="opt3" value="opt1input" required>
                                    <label for="opt3" aria-label="opt3">
                                        <span></span>
                                        option 3
                                    </label>
                                </div>
                                <div class="option">
                                    <input type="radio" name="option" id="opt4" value="opt1input" required>
                                    <label for="opt4" aria-label="opt4">
                                        <span></span>
                                        option 4
                                    </label>
                                </div>
                                <div class="option">
                                    <input type="radio" name="option" id="opt5" value="opt1input" required>
                                    <label for="opt5" aria-label="opt5">
                                        <span></span>
                                        option 5
                                    </label>
                                </div>
                            </div>
                        </section>
                        <footer>
                            <div class="btns">
                                <button class="back btn"><svg class="colorchange" width="33" height="32"
                                                              viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32 16L5 16" stroke="#205874" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14 25L5 16L14 7" stroke="#205874" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 16L28 16" stroke="white" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round" />
                                        <path d="M19 7L28 16L19 25" stroke="white" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Previous
                                </button>
                                <button class="btn next">Next <svg width="33" height="32" viewBox="0 0 33 32"
                                                                   fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 16L28 16" stroke="white" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round" />
                                        <path d="M19 7L28 16L19 25" stroke="white" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> <svg class="colorchange" width="33" height="32" viewBox="0 0 33 32"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32 16L5 16" stroke="#205874" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14 25L5 16L14 7" stroke="#205874" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="btn finish-btn">Finish</button>
                            </div>
                        </footer>
                    </div>
                    <div class="qoutationwrapper">
                        <blockquote>Self-care is essential to combating burnout.</blockquote>
                        <p>Asa Don Brown</p>
                    </div>
                </div>
            </div>
        </Section>
        <section class="finishbody">
            <header>
                <div class="header_Wrapper">
                    <div class="logo">
                        <img src="assests/images/Group 28.png" alt="logo-image" />
                    </div>
                </div>
            </header>
            <div class="candidate-detail">
                <div class="formbox">
                    <h2>Completed!</h2>
                    <p>Please fill below information so we can send the results with you via email.</p>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="first-name" id="first_name" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last-name" id="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="col-md-12">
                                <p>Gender</p>
                                <ul>
                                    <li>
                                        <input type="radio" name="gender" id="gender" value="female" required>
                                        <label for="female">
                                            Female
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" name="gender" id="gender" value="male"  required>
                                        <label for="male">
                                            Male
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" name="gender" id="gender" value="other" required>
                                        <label for="other">
                                            Other
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" id="email" placeholder="Email Adrress" required>
                            </div>
                            <div class="col-md-12">
                                <select name="Age" id="age-select">
                                    <option value="">Age</option>
                                    <option value="<25"><25</option>
                                    <option value="26-35">26-35</option>
                                    <option value="36-45">36-45</option>
                                    <option value="46-55">46-55</option>
                                    <option value="56<">56<</option>

                                </select>
                            </div>
                            <div class="col-md-12">
                                <select name="occupation" id="occupation">
                                    <option value="">Occupation</option>
                                    <option value="10">Software Engineer</option>
                                    <option value="12">Teacher</option>
                                    <option value="14">Doctor</option>
                                    <option value="16">Nurse</option>
                                    <option value="20">Engineer</option>
                                    <option value="22">Data Analysis</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input class="btn submit-btn" type="Button" name="submit" value="submit" required>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div id="divMsg" style="display:none;">
            <img src="assests/images/loader.gif" alt="Please wait.." />
        </div>
        <section class="thankyoubody">
            <header>
                <div class="header_Wrapper">
                    <div class="logo">
                        <img src="assests/images/Group 28.png" alt="logo-image" />
                    </div>
                </div>
            </header>
            <div class="candidate-detail">
                <div class="formbox">
                    <h2>Thanks!</h2>
                    <p>Your burnout profile will be in your e-mail shortly !</p>
                    <ul id="save_msgList"></ul>
                    <div id="success_message"></div>

                </div>
            </div>
        </section>
    </div>

</main>

<script>


    $(document).ready(function () {


        const quiz =[];
        var total_q = [];
        let quizJSON = [];
        fetchquestions();
        function fetchquestions() {
            $.ajax({
                type: "GET",
                url: "/fetch_quiz",
                dataType: "json",
                success: function (response) {
                            quizJSON = response.questions;
                    total_q = Object.keys(quizJSON).length;
                }
            });
        }
        //
        //console.log(quiz);
        // Json work finished

        var questionIndex = 0;
        var showquestionno = 1;
        let scndsLftOfQueArr = [];
        let radioBtnChecked = [];
        const Answerstore = [];




        let indexanswer = 0;

        // Some work for DOM Manipulation start




        $("#mainButton").click(function () {
            $(".quizbody").slideUp(1000);
            $(".questionbody").fadeIn(1000);
            $(".text-section").hide();

            // countTotalTime();
            showquestionnum(showquestionno);

            showquestion(questionIndex);
            diablingButtons();
            //saveRadioBtnValue();
            $("#bar").width('5%');
            $(".tQNO").text(total_q);
            //startTimeLeft();
            //checkTODisabelPointer();
        });

        $('.btn').on('mouseenter', function () {
            $(this).addClass('active');
        });
        $('.btn').on('mouseleave', function () {
            $(this).removeClass('active');
        });

        function diablingButtons() {
            if (questionIndex == 0) {
                $(".back").addClass('disable');
            }
            else {
                $(".back").removeClass('disable');
            }
        }



        // Some work for DOM Manipulation end

        //allowing uncheck the radio button -->
        document.querySelectorAll('input[type=radio][name=option]').forEach((elem) => {
            elem.addEventListener('click', allowUncheck);
            elem.previous = elem.checked;
        });


        function allowUncheck(e) {
            if (this.previous) {
                this.checked = false;
            }
            document.querySelectorAll(
                `input[type=radio][name=${this.name}]`).forEach((elem) => {
                elem.previous = elem.checked;
            });
        }


        //showing the QUESTIONS function -->
        function showquestion(questionno) {
            radioButtons = $("input:radio[name='option']");

                  index = quizJSON[questionno];
                   //console.log(index);
                    $(".que_text").text(index.question);
                $("#q_id").text(index.id);
                $("#cat1_id").text(index.category_id);
                $("label").eq(0).text(index.question_options[0].option);
            $("#opt1_id").text(index.question_options[0].id);
            $("label").eq(1).text(index.question_options[1].option);
            $("#opt2_id").text(index.question_options[1].id);
            $("label").eq(2).text(index.question_options[2].option);
            $("#opt3_id").text(index.question_options[2].id);
            $("label").eq(3).text(index.question_options[3].option);
            $("#opt4_id").text(index.question_options[3].id);
            $("label").eq(4).text(index.question_options[4].option);
            $("#opt5_id").text(index.question_options[4].id);
            $("input:radio[name='option']").each(function (i) {
                this.checked = false;
            });
                for (var x = 0; x < radioButtons.length; x++) {
                    var idVal = $(radioButtons[x]).attr("id");

                    radioBtnCheckedVal = $("label[for='" + idVal + "']").text();
                    if (radioBtnCheckedVal === radioBtnChecked[questionno]) {
                        radioButtons[x].checked = true;
                    }
                    if (radioBtnChecked[questionno] === " ") {
                        radioButtons[x].checked = false;
                    }
                }

        }
        //  calculating the score and storing the checked values in-->
        let radioBtnCheckedVal;
        var j = 0;
        // const ans ={
        //     'question_id':'',
        //     'category_id':'',
        //     'option_id':''
        // };
        function saveRadioBtnValue() {
            $("input:radio[name='option']").each(function (i) {
                if ($(this).is(':checked')) {

                    const ans ={
                        'question_id':'',
                        'category_id':'',
                        'option_id':''
                    };
                    var idVal = $(this).attr("id");
                    var opt_id = $('#'+idVal+'_id').text();
                    var q_id   =$('#q_id').text();
                    var cat_id   =$('#cat1_id').text();
                    ans.question_id = q_id;
                    ans.category_id = cat_id;
                    ans.option_id = opt_id;

                    console.log(ans);
                    Answerstore.push(ans);

                    console.log(Answerstore);



                    radioBtnCheckedVal = $("label[for='" + idVal + "']").text();

                }
                else {
                    radioBtnCheckedVal = " "
                }
            });

        }
        // calculating the score <--

        //showing the QUESTIONS Number function -->
        function showquestionnum(showquestionno) {
            $(".QNO").text(showquestionno+ " ");
        }
        //showing the QUESTIONS Number function <--




        // adding the functionalities to buttons starts

        $(".back").click(function () {
            if (questionIndex < total_q && questionIndex >= 1) {
                $(".result").hide();
                $(".next").show();
                //$(".skip").removeClass('disable');
                $(".finish-btn").hide();
                $("#marquee").remove();
                // saveRadioBtnValue();
                Answerstore.pop();

                questionIndex--;
                showquestionno--;
                showquestionnum(showquestionno);
                showquestion(questionIndex);
                diablingButtons();
                if (index.pointerEvents === true) {
                    $(".option_list").addClass("pointerNone");


                }
                else {
                    $(".option_list").removeClass("pointerNone");
                }

            }
            else {
                diablingButtons();
            }
            if (showquestionno > 0)
                $("#bar").width('5%');
            if (showquestionno > 1)
                $("#bar").width('5%');
            if (showquestionno > 2)
                $("#bar").width('10%');
            if (showquestionno > 3)
                $("#bar").width('15%');
            if (showquestionno > 4)
                $("#bar").width('20%');
            if (showquestionno > 5)
                $("#bar").width('25%');
            if (showquestionno > 6)
                $("#bar").width('35%');
            if (showquestionno > 7)
                $("#bar").width('50%');
            if (showquestionno > 8)
                $("#bar").width('60%');
            if (showquestionno > 9)
                $("#bar").width('65%');
            if (showquestionno > 10)
                $("#bar").width('70%');
            if (showquestionno > 11)
                $("#bar").width('75%');
            if (showquestionno > 12)
                $("#bar").width('80%');
            if (showquestionno > 13)
                $("#bar").width('85%');
            if (showquestionno > 14)
                $("#bar").width('90%');
            if (showquestionno > 15)
                $("#bar").width('95%');


        });
let optioncheck= true;

        $(".next, .skip").click(function () {
            //alert(total_q);
            $('#save_msg').show()
            $("input:radio[name='option']").each(function (i) {
                if ($(this).is(':checked')) {
                    $('#save_msg').hide()
                    if (showquestionno < total_q) {
                        $("#marquee").remove();

                        $(".finish-btn").hide();
                        saveRadioBtnValue();
                        questionIndex++;
                        showquestionno++;

                        showquestionnum(showquestionno);
                        showquestion(questionIndex);

                        diablingButtons();
                        $(".fininsh-btn").hide();

                    }
                    if (showquestionno === total_q) {
                        //$(".skip").addClass('disable');
                        $(".next").hide();
                        $(".finish-btn").show();
                    }
                    if (questionIndex === 1) {
                        $(".finish-btn").hide();
                    }
                    if (showquestionno > 0)
                        $(".back").prop("disabled", false);
                    $("#bar").width('10%');
                    if (showquestionno > 1)
                        $("#bar").width('15%');
                    if (showquestionno > 2)
                        $("#bar").width('20%');
                    if (showquestionno > 3)
                        $("#bar").width('25%');
                    if (showquestionno > 4)
                        $("#bar").width('30%');
                    if (showquestionno > 5)
                        $("#bar").width('35%');
                    if (showquestionno > 6)
                        $("#bar").width('40%');
                    if (showquestionno > 7)
                        $("#bar").width('50%');
                    if (showquestionno > 8)
                        $("#bar").width('55%');
                    if (showquestionno > 9)
                        $("#bar").width('60%');
                    if (showquestionno > 10)
                        $("#bar").width('75%');
                    if (showquestionno > 11)
                        $("#bar").width('80%');
                    if (showquestionno > 12)
                        $("#bar").width('85%');
                    if (showquestionno > 13)
                        $("#bar").width('90%');
                    if (showquestionno > 14)
                        $("#bar").width('95%');
                    if (showquestionno > 15)
                        $("#bar").width('100%');
                }
                else
                {
                   optioncheck=false;
                }
            });
            if (optioncheck===false)
            {

                $('#save_msg').text("Please choose One Option")
            }
            else
            {
                $('#save_msg').text("")
            }



        });







        let width1 = 0;
        let perc1 = 0;
        function gettingPerc() {
            perc1 = (CA / 20) * 100;
            perc1 = Math.round(perc1);
            width1 = perc1;
            $(".perc-line").css({
                "width": `${width1}%`,
                "transition": "width 1s linear"
            });
        }

        let width2 = 0;
        let perc2 = 0;
        function gettingPercTime() {
            perc2 = (totaltime / 400) * 100;
            width2 = perc2;
            $(".time-line").css({
                "width": `${width2}%`,
                "transition": "width 1s linear"
            });
        }
        // CHECKING THE PECENTAGE




        $(".finish-btn").click(function () {

            $(".questionbody").hide();
            $(".finishbody").fadeIn();
            saveRadioBtnValue();


        });
        $(".submit-btn").click(function () {
            $(".questionbody").hide();
            $(".finishbody").hide();
            $('#divMsg').show();
            var f_name   =$('#first_name').val();
            var l_name   =$('#last_name').val();
            var gender   = document.querySelector('input[name="gender"]:checked').value;
            var email   =$('#email').val();
            var age   =$('#age-select').val();
            var occupation   = $('#occupation').val();

            var user_data = {
                'f_name': f_name,
                'l_name':l_name,
                'gender': gender,
                'email':email,
                'age': age,
                'occupation':occupation,
            }
            var data = {
                user_data: user_data,
                Answers:Answerstore,
            };
            console.log(Answerstore);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/result",
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
                        $('#divMsg').hide();
                        $(".questionbody").hide();
                        $(".finishbody").hide();
                        $(".thankyoubody").fadeIn();


                    }
                }
            });



        });

    });

</script>
</body>

</html>

