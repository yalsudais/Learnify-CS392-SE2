<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PDF Viewer with Arabic Support</title>
  <script src="include/build/pdf.js"></script>
  <style>
    body {
      background-color: #f7f7f7; /* Set background color */
    }
    #pdfContainer {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 80px); /* Decrease height of button container and add more space */
      font-size: 24px; /* Increase font size */
      padding: 20px; /* Add padding for more whitespace */
      box-sizing: border-box; /* Make sure padding is included in element dimensions */
      border: 4px solid #4cc9f0; /* Add border to container */
      border-radius: 15px; /* Add border radius to container */
      background-color: white; /* Set container background color */
    }
    #pdfContainer canvas {
      max-width: 100%;
      max-height: 100%;
      border-radius: 10px; /* Add border radius to canvas */
    }
    #pdfContainer::after {
      content: "";
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 5px;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      font-size: 16px;
      border-radius: 5px;
    }
    #buttonContainer {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80px; /* Increase button container height */
      padding: 0 20px; /* Add padding to button container */
    }
    #buttonContainer button {
      margin: 0 10px;
      font-size: 20px; /* Increase font size of buttons */
      padding: 8px 16px; /* Increase padding of buttons */
      border-radius: 8px; /* Add border radius to buttons */
      border: none; /* Remove default border */
      background-color: #4cc9f0; /* Set button background color */
      color: white; /* Set button text color */
      cursor: pointer; /* Change cursor to pointer on hover */
      transition: background-color 0.3s; /* Add transition effect */
    }
    #buttonContainer button:hover {
      background-color: #3db2e1; /* Change button background color on hover */
    }
    #buttonContainer button:active {
      background-color: #2a8ab7; /* Change button background color on click */
    }
    


  </style>
</head>
<body>
  <div id="pdfContainer">
    <canvas id="pdfCanvas"></canvas>
  </div>
  <div id="buttonContainer" dir="rtl">
    <button id="prevPage">السابق</button>
    <button id="nextPage" dir="rtl">التالي</button>
    <button id="question" dir="rtl">الاجابة عن الاسئلة</button>
    <button id="fullscreen" dir="rtl" style="display:none"></button>
    <button id="home_book" dir="rtl">الرجوع الى الصفحة الرئيسية</button>

   
  </div>
  <script>
  let pdfDoc = null;
    let pageNum = 1;
    let pageRendering = false;
    let pageNumPending = null;
    let pageViewingTime = 0;
    let startTime = Date.now();
    const scale = 1.0;
    const canvas = document.getElementById('pdfCanvas');
    const ctx = canvas.getContext('2d');
    const timeSpentOnPages = [];
    let questions = [];

const params = new URLSearchParams(window.location.search);
const file_name = params.get("fileId");
    const char = ".";
const position = file_name.indexOf(char);
const cutString = file_name.slice(0, position);
    function renderPage(num) {
      pageRendering = true;

      pdfDoc.getPage(num).then((page) => {
        const viewport = page.getViewport({scale});
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
          canvasContext: ctx,
          viewport,
        };
        const renderTask = page.render(renderContext);

        renderTask.promise.then(() => {
          pageRendering = false;
          if (pageNumPending !== null) {
            renderPage(pageNumPending);
            pageNumPending = null;
          }
        });
      });

      // Record time spent on current page
      if (pageNum > 1) {
        pageViewingTime = Date.now() - startTime;
        startTime = Date.now();

        // Send the data to the back-end
        sendDataToBackend(pageNum, pageViewingTime,cutString);
      }
   
    }

    function queueRenderPage(num) {
      if (pageRendering) {
        pageNumPending = num;
      } else {
        renderPage(num);
      }
    }

    function onPrevPage() {
      if (pageNum <= 1) {
        return;
      }
      pageNum--;
      queueRenderPage(pageNum);
    }

    function onNextPage() {
      if (pageNum >= pdfDoc.numPages) {
        onQuestion();
        // Store time spent on pages in database
       
        return;
      }
      pageNum++;
      queueRenderPage(pageNum);
    }

   
    fetch("get-question.php")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        questions = data;
      })
      .catch((error) => {
        console.error("قد لايحتوي هذا الكتاب  على اسئله:", error);
      });

   

    const destinationUrl = `display_question.php?book_id=${cutString}`;

    function onQuestion() {
    
      window.location.href = destinationUrl;
    }
    function goBackWithState() {
  var stateObj = { value: "myValue" };
  window.history.back();
  window.history.pushState(stateObj, "", "");
}

    const url = "upload/" + file_name;

    document.getElementById('prevPage').addEventListener('click', onPrevPage);
    document.getElementById('nextPage').addEventListener('click', onNextPage);
    document.getElementById('question').addEventListener('click', onQuestion);
    document.getElementById('fullscreen').addEventListener('click', enterFullScreen);
    document.getElementById('home_book').addEventListener('click', goBackWithState);

    pdfjsLib.getDocument(url).promise.then((pdfDoc_) => {
      pdfDoc = pdfDoc_;
      document.getElementById('nextPage').disabled = false;
      renderPage(pageNum);
    });

  
    function sendDataToBackend(pageNumber, viewTime,book_id) {
      // Replace the URL below with the URL of your server-side script
      const url = "store-time-spent.php";
      const xhr = new XMLHttpRequest();
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(`page=${pageNumber}&time=${viewTime} &book_id=${book_id}`);
    }
    function getSessionVariable(callback)
  {
var xhr = new XMLHttpRequest(); // create XMLHttpRequest object
xhr.open("GET", "get_variable.php"); // specify the PHP script to handle the request
xhr.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var variableValue = this.responseText; 
   // retrieve the variable value from the response
      callback(variableValue); // call the callback function with the variable value as the argument
 // use the variable value
  }
};
xhr.send(); // send the request to the PHP script
  }
// define the callback function
function handleVariableValue(variableValue) {
  if (variableValue==1) {
  alert(variableValue);
  document.documentElement.requestFullscreen(); // enter full screen mode
  document.addEventListener('fullscreenchange', function() {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen(); // re-enter full screen mode
    }
  });
}
}

  function enterFullScreen() {
    var element = document.documentElement;
    if (element.requestFullscreen) {
      element.requestFullscreen();
    } else if (element.webkitRequestFullscreen) {
      element.webkitRequestFullscreen();
    } else if (element.mozRequestFullScreen) {
      element.mozRequestFullScreen();
    } else if (element.msRequestFullscreen) {
      element.msRequestFullscreen();
    }
  }
  const clickEvent = new MouseEvent('click', {
  bubbles: true,
  cancelable: true,
  view: window
});
document.addEventListener("click", function() {
      enterFullScreen();
        });
  document.addEventListener("DOMContentLoaded", function() {
    getSessionVariable(function(result) {
      if (result == 1) {
        document.dispatchEvent(clickEvent);
      
      }
     
    });
   
  });
  

    </script>
</body>
</html>