let questionCounter = 1;
let questions = [];

function addQuestion() {
  const questionContainer = document.createElement('div');
  questionContainer.classList.add('question');

  const questionInput = document.createElement('input');
  questionInput.type = 'text';
  questionInput.classList.add('form-control');
  questionInput.placeholder = 'Question Text';
  questionInput.name = `question_${questionCounter}`;

  const addOptionsButton = document.createElement('button');
  addOptionsButton.classList.add('btn', 'btn-primary');
  addOptionsButton.innerHTML = 'Add Options';
  addOptionsButton.onclick = addOptions.bind(null, questionContainer);

  questionContainer.appendChild(questionInput);
  questionContainer.appendChild(addOptionsButton);

  document.getElementById('question-container').appendChild(questionContainer);

  questionCounter++;
}

function addOptions(questionContainer) {
  const optionsContainer = document.createElement('div');
  optionsContainer.classList.add('options');

  const optionInput = document.createElement('input');
  optionInput.type = 'text';
  optionInput.classList.add('form-control');
  optionInput.placeholder = 'Option Text';
  optionInput.name = `option_${questionCounter}[]`;

  const optionCheckbox = document.createElement('input');
  optionCheckbox.type = 'checkbox';

  const removeOptionButton = document.createElement('button');
  removeOptionButton.classList.add('btn', 'btn-danger', 'remove-option');
  removeOptionButton.innerHTML = 'Remove Option';
  removeOptionButton.onclick = removeOption.bind(null, optionsContainer);

  optionsContainer.appendChild(optionCheckbox);
  optionsContainer.appendChild(optionInput);
  optionsContainer.appendChild(removeOptionButton);

  questionContainer.appendChild(optionsContainer);

  // Add oninput event to the optionInput field to generate a new field when typing
  optionInput.oninput = function() {
    if (optionInput.value !== '') {
      addOptions(questionContainer);
      optionInput.oninput = null; // Remove the event for the current field after adding a new field
    }
  };

  // Add onfocusout event to the optionInput field to hide the field when removing the text
  optionInput.onfocusout = function() {
    if (optionInput.value === '') {
      optionsContainer.style.display = 'none';
    }
  };
}

function removeOption(optionsContainer) {
  optionsContainer.remove();
}

document.addEventListener('DOMContentLoaded', function() {
  var addQuizButton = document.getElementById('btnadd-quize');
  if (addQuizButton) {
    addQuizButton.addEventListener('click', function() {
      alert("");
      $('#save-quize-Modal').modal('show');
    });
  }

  document.getElementById('add_quize').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    // Collect data from the form
    var quizTitle = document.getElementById('quiz-title').value;
  
    var questionsData = []; // Array to store question data
    var isDataValid = true; // Flag to track if all questions have at least one option checked
  
    // Collect data from each question
    var questionContainers = document.querySelectorAll('.question');
    questionContainers.forEach(function(questionContainer) {
      var questionInput = questionContainer.querySelector('input[name^="question_"]');
      var questionText = questionInput.value;
  
      // Skip empty questions
      if (questionText.trim() === '') {
        return;
      }
  
      var choices = [];
      var isOptionChecked = false; // Flag to track if at least one option is checked
  
      // Collect data from options within the current question
      var choiceInputs = questionContainer.querySelectorAll('.options input[name^="option_"]');
      choiceInputs.forEach(function(choiceInput) {
        var choiceText = choiceInput.value;
        var isChecked = choiceInput.previousElementSibling.checked;
  
        // Add choice data to the choices array
        if(choiceText!=="")
        {

        
        choices.push({
          choice_text: choiceText,
          is_checked: isChecked
        });
      }
        // Check if at least one option is checked
        if (isChecked) {
          isOptionChecked = true;
        }
      });
  
      // If no option is checked, set the flag to false
      if (!isOptionChecked) {
        isDataValid = false;
        return;
      }
  
      // Add question data to the questions array
      questionsData.push({
        question_text: questionText,
        choices: choices
      });
    });
  
    // If there is any question without an option checked, show an error message
    if (!isDataValid) {
      alert("Please select at least one option for each question.");
      return;
    }
  
    // Create an object containing the quiz data
    var quizData = {
      title: quizTitle,
      questions: questionsData
    };
  
    // Convert the object to a JSON string
    var jsonData = JSON.stringify(quizData);
  
    // Create an AJAX request to send the data to the PHP file
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        // Server response
        console.log(this.responseText);
      }
    };
    xhttp.open("POST", "../php/add_quiz.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(jsonData);
  });
});

$(document).ready(function () {
  loadQuizzes();
  $('#btn-delete-quizzes-yes').on('click', function () {

    var quiz_id = $(this).data('id');
    $.ajax({
        url: '../php/quizzesOpertion.php',
        type: 'POST',
        data: { function_name: "delete_quizzes", quiz_id: quiz_id },
        success: function (data) {
            $('#confirm-delete-quizzes').modal('hide');
            // Your success code here
            if (data.trim() == "1") {
                row_select_quizzes.remove();
            } else {
                console.error("Failed to find selected row");
            }
        }
    });
    $('#confirm-delete-vendors').modal('hide');
});

});
$('#update-quizzes').on('click', function () {

  var quiz_id = $("#m-quiz_id2").val();

  var title = $("#m-title2").val();
  var description = $("#m-description2").val();
  $.ajax({
      url: '../php/quizzesOpertion.php',
      type: 'POST',
      data: { function_name:"update_quizzes", quiz_id: quiz_id, title: title, description: description },
      success: function (data) {
console.log(data);
          // Your success code here
     
          if (data.trim() == "1") {
          
          }

          $('#update-quizzes-Modal').modal("hide");
      }
  });
});
// function loadQuizzes() {
//   $.ajax({
//       url: 'quizzesOpertion.php',
//       type: 'post',
//       data: {
//           function_name: "select_data"
//       },
//       dataType: 'json',
//       success: function(data) {
//           var table = '<table id="table-quizzes" class="table">';
//           table += '<tr><th class="table-header">quiz_id</th><th class="table-header">user_id</th><th class="table-header">title</th><th class="table-header">description</th><th class="table-header">operation</th></tr>'
//           for (var i = 0; i < data.length; i++) {
//               table += '<tr>';

//               table += '<td class="table-data">' + data[i].quiz_id + '</td>'
            
//               table += '<td class="table-data">' + data[i].description + '</td>'
//               table += '<td><center>' +
//                   '<button class="btn px-3 btn-sm btn-info edit-quizzes" data-id="' + data[i].quiz_id + '"> <i class="fa fa-edit"></i> تعديل </button>' +
//                   '<button class="btn px-3 btn-sm btn-danger remove-quizzes" data-id="' + data[i].quiz_id + '"> <i class="fa fa-trash"></i> حذف </button></center></td>';
//               table += '</tr>';
//           }
//           table += '</table>';
//           $('#tableContainer_quizzes').html(table);
//           tableselect_quizzes = $('#table-quizzes');
//           $('#table-quizzes').on('click', '.remove-quizzes', function() {
//               var quiz_id = $(this).data('id');
//               row_select_quizzes = $(this).closest('tr');
//               $('#btn-delete-quizzes-yes').data('id', quiz_id);
//               $('#confirm-delete-quizzes').modal('show');

//           });
//           $('#table-quizzes').on('click', '.edit-quizzes', function() {

//               row_select_quizzes = $(this).closest('tr');

//               var quiz_id = row_select_quizzes.find('td:nth-child(1)').text()
//               var user_id = row_select_quizzes.find('td:nth-child(2)').text()
//               var title = row_select_quizzes.find('td:nth-child(3)').text()
//               var description = row_select_quizzes.find('td:nth-child(4)').text()
//               //assignment td value to input in modal

//               $('#m-quiz_id').val(quiz_id);
//               $('#m-user_id').val(user_id);
//               $('#m-title').val(title);
//               $('#m-description').val(description);
//               $('#update-quizzes-Modal').modal("show");
//           });
//       }
//   });
// }

function loadQuizzes() {
  $.ajax({
    url: '../php/quizzesOpertion.php',
    type: 'post',
    data: {
      function_name: "select_data"
    },
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var table = '<table id="table-quizzes" class="table">';
      table += '<tr><th class="table-header">quiz_id</th><th class="table-header">title</th><th class="table-header">description</th><th class="table-header">operation</th></tr>';
      for (var i = 0; i < data.length; i++) {
        table += '<tr>';

        table += '<td class="table-data">' + data[i].quiz_id + '</td>';

        table += '<td class="table-data">' + data[i].title + '</td>';
        
        table += '<td class="table-data">' + data[i].description + '</td>';
        table += '<td><center>' +
          '<button class="btn px-3 btn-sm btn-info edit-quizzes" data-id="' + data[i].quiz_id + '"> <i class="fa fa-edit"></i> تعديل </button>' +
          '<button class="btn px-3 btn-sm btn-danger remove-quizzes" data-id="' + data[i].quiz_id + '"> <i class="fa fa-trash"></i> حذف </button>' +
          '<button class="btn px-3 btn-sm btn-primary show-details">Show Details</button>' +
          '</center></td>';
        table += '</tr>';
        table += '<tr class="quiz-details-row" style="display: none;">' +
          '<td colspan="5">' +
          '<div class="quiz-details">';

        for (var j = 0; j < data[i].questions.length; j++) {
          var question = data[i].questions[j];
          table += '<div class="question">' +
            '<h4>Question:</h4>' +
            '<p>' + question.question_text + '</p>' +
            '<h4>Choices:</h4>' +
            '<ul class="choices">';

          for (var k = 0; k < question.choices.length; k++) {
            var choice = question.choices[k];
            table += '<li>' +
              '<input type="checkbox" class="choice-checkbox" id="choice-' + j + '-' + k + '">' +
              '<label for="choice-' + j + '-' + k + '">' + choice.choice_text + '</label>' +
              '</li>';
          }

          table += '</ul>' +
            '</div>';
        }

        table += '</div>' +
          '</td>' +
          '</tr>';
      }
      table += '</table>';
      $('#tableContainer_quizzes').html(table);
      tableselect_quizzes = $('#table-quizzes');
      $('#table-quizzes').on('click', '.remove-quizzes', function() {
        var quiz_id = $(this).data('id');
        row_select_quizzes = $(this).closest('tr');
        $('#btn-delete-quizzes-yes').data('id', quiz_id);
        $('#confirm-delete-quizzes').modal('show');
      });
      $('#table-quizzes').on('click', '.edit-quizzes', function() {
        row_select_quizzes = $(this).closest('tr');
        var quiz_id = row_select_quizzes.find('td:nth-child(1)').text();

        var title = row_select_quizzes.find('td:nth-child(2)').text();
        var description = row_select_quizzes.find('td:nth-child(3)').text();
        //assignment td value to input in modal
        $('#m-quiz_id2').val(quiz_id);
        // $('#m-user_id').val(user_id);
        $('#m-title2').val(title);
        $('#m-description2').val(description);
        $('#update-quizzes-Modal').modal("show");
      });
      $('#table-quizzes').on('click', '.show-details', function() {
        $(this).closest('tr').next('.quiz-details-row').toggle();
      });
    }
  });
}