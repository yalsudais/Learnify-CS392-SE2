function validateForm(parentId) {
  var parentElement = document.getElementById(parentId);
  var inputs = parentElement.querySelectorAll('input, select, textarea');
  var errors = {};
  removeErrors(parentElement);
  for (var i = 0; i < inputs.length; i++) {
    var input = inputs[i];
    var fieldName = input.name;
    var fieldValue = input.value.trim();
    var rules = input.dataset.validation;

    if (rules) {
      var ruleList = rules.split('|');

      for (var j = 0; j < ruleList.length; j++) {
        var rule = ruleList[j];

        if (rule === 'required' && !fieldValue) {
          errors[fieldName] = 'This field is required.';
        }

        if (rule === 'email' && fieldValue && !isValidEmail(fieldValue)) {
          errors[fieldName] = 'Invalid email format.';
        }

        if (rule === 'phone' && fieldValue && !isValidPhoneNumber(fieldValue)) {
          errors[fieldName] = 'Invalid phone number.';
        }

      }
    }
  }

  if (Object.keys(errors).length > 0) {
    displayErrors(errors, parentElement);
    return false;
  } else {
    removeErrors(parentElement);
    return true;
  }
}

async function isValueUnique(tableName, columnName, value) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/check_uniqueness.php",
      data: {
        tableName: tableName,
        columnName: columnName,
        value: value
      },
      dataType: "json",
      success: function (response) {
        alert(response);
        resolve(response === 1)


      },
      error: function (xhr, status, error) {
        reject("An error occurred while checking uniqueness.");
      }
    });
  });
}

function displayErrors(errors, parentElement) {
  for (var field in errors) {
    var inputElement = parentElement.querySelector('[name="' + field + '"]');
    var errorElement = parentElement.querySelector('[data-error-for="' + field + '"]');

    if (errorElement) {
      errorElement.textContent = errors[field];
    } else {
      // Create a new error div element
      errorElement = document.createElement('div');
      errorElement.classList.add('error-message');
      errorElement.textContent = errors[field];
      errorElement.setAttribute('data-error-for', field);

      // Insert error div element after the input element
      inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
    }
  }
}

function removeErrors(parentElement) {
  var errorElements = parentElement.querySelectorAll('.error-message');

  errorElements.forEach(function (errorElement) {
    errorElement.parentNode.removeChild(errorElement);
  });
}

function isValidEmail(value) {
  // Use a regular expression to validate email format
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(value);
}

function isValidPhoneNumber(phoneNumber) {
  var phoneRegex = /^\+\d{13}$/; // Assumes a phone number format starting with + and followed by 13 digits
  return phoneRegex.test(phoneNumber);
}
function check_permission(userId, privilege_id, class_name = null, id) {
  // AJAX request to fetch privilege data for the selected user
  $.ajax({
    url: 'php/check_permision.php',
    method: 'post',
    data: {
      userId: userId,
      privilegeId: privilege_id,
      function_name: 'getUserPrivileges'
    },
    cache: false,
    success: function (data) {
      try {
        const privileges = JSON.parse(data);

        var element = (class_name !== null ? document.getElementsByClassName(class_name)[0] : document.getElementById(id));
        console.log(data);

        if (privileges[0].permission === '1') {
          element.disabled = false; // Enable the button
        } else {
          element.disabled = true; // Disable the button
        }
      } catch (error) {
        console.error('Error parsing JSON data:', error);
      }
    },
    error: function () {
      console.error('Error retrieving privilege data');
    }
  });
}

function checkUserPermissions(userId) {

  const elements = document.querySelectorAll('[data-permission]');
  console.log(userId);
  console.log(elements);
  elements.forEach(function (element) {
    const requiredPermission = parseInt(element.getAttribute('data-permission'));

    // AJAX request to fetch privilege data for the selected user
    $.ajax({
      url: 'php/check_permission.php',
      method: 'post',
      data: {
        userId: userId,
        privilegeId: requiredPermission,
        function_name: 'getUserPrivileges'
      },
      cache: false,
      success: function (data) {

        try {
          const privileges = JSON.parse(data);

          if (privileges[0].permission === '1') {
            element.disabled = false; // Enable the element
          } else {
            element.disabled = true; // Disable the element
          }
        } catch (error) {
          console.error('Error parsing JSON data:', error);
        }
      },
      error: function () {
        console.error('Error retrieving privilege data');
      }
    });
  });
}
