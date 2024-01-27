var selectedOption = "";
$(document).ready(function() {
    var inputField = document.getElementById("searchInput");
    var dropdownMenu = document.querySelector('.dropdown-menu');

  
    dropdownMenu.addEventListener('click', function(event) {
      if (event.target.classList.contains('dropdown-item')) {
        selectedOption = event.target.getAttribute('data-filter');
   
      }
    });
  
    inputField.addEventListener('keydown', function(event) {
      if (event.key === 'Enter') {
        handleSearch();
      }
    });
  
    $("#searchButton").click(function() {
      handleSearch();
    });
  });
  
  function handleSearch() {
    var keyword = $('#searchInput').val();
  
    $.ajax({
      url: 'searchFolder/searchOpertion.php',
      type: 'POST',
      data: {
        function_name: "searchInDatabase",
        keyword: keyword,
        filter: selectedOption
      },
      dataType: "json",
      success: function(response) {
        console.log(response);
  
        $('#results').empty();
        // Process the response data
        for (var i = 0; i < response.length; i++) {
          var result = response[i];
  
          var html = '<a href="' + result.details_page + '?upload_id=' + result.upload_id + '&course_id=' + result.course_id + '" class="row card">' +
            '  <div class="col">' +
            '    <h4>' + result.title + '</h4>' +
            '    <p>' + result.content + '</p>' +
            '  </div>' +
            '</a>';
  
          // Append the HTML to the container
          $('#results').append(html);
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }