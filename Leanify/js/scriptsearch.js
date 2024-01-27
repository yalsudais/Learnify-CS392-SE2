$(document).ready(function() {
    var searchInput = $('#searchInput');
    var clearButton = $('#clearButton');
    var filterButton = $('#filterButton');

    function filterResults(filterOption) {
      var searchText = searchInput.val().toLowerCase();
      console.log("Performing filtering for option: " + filterOption);
      console.log("Search Text: " + searchText);

      filterButton.html('<i class="uil uil-filter"></i> ' + filterOption);
      $('.dropdown-menu').removeClass('show');
    }

    // $('#searchButton').click(function() {
    //   filterResults('option1');
    // });

    clearButton.click(function() {
      searchInput.val('');
      clearButton.hide();
    });

    $('#filterButton').click(function() {
      $('.dropdown-menu').toggleClass('show');
    });

    $('.filterOption').click(function(e) {
      e.preventDefault();
      var filterOption = $(this).text();
      filterResults(filterOption);
    });
    searchInput.keyup(function() {
      var searchText = searchInput.val().trim();
      if (searchText !== '') {
        clearButton.show();
      } else {
        clearButton.hide();
      }
    });
  });
     
$(document).ready(function() {
$("#searchButton").click(function() {

  // $("#searchResultsContainer").toggle();
});
});