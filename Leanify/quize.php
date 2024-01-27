<!DOCTYPE html>
<html>
<head>
  <title>عرض الكويزات</title>
</head>
<body>
  <table id="quizzesTable">
    <thead>
      <tr>
        <th>عنوان الكويز</th>
        <th>عرض التفاصيل</th>
      </tr>
    </thead>
    <tbody>
      <?php
  include "php/config.php";
      // إنشاء اتصال بقاعدة البيانات
  

      // استعلام لاسترداد الكويزات
      $quizzesQuery = "SELECT * FROM quizzes";
      $quizzesResult = $conn->query($quizzesQuery);

      if ($quizzesResult->num_rows > 0) {
          while ($quiz = $quizzesResult->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $quiz['title'] . "</td>";
              echo "<td><button onclick=\"showQuizDetails(" . $quiz['quiz_id'] . ")\">عرض التفاصيل</button></td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='2'>لا توجد كويزات.</td></tr>";
      }

      // إغلاق الاتصال بقاعدة البيانات
      $conn->close();
      ?>
    </tbody>
  </table>

  <script>
    // استعمال واجهة برمجة التطبيقات (API) لاسترداد البيانات من قاعدة البيانات
    function fetchData(query, params) {
      // استبدل "api-url" بعنوان URL الصحيح لواجهة برمجة التطبيقات (API) التي تستخدمها لاسترداد البيانات من قاعدة البيانات.
      var apiUrl = "";
      return fetch(apiUrl, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          query: query,
          params: params
        })
      })
      .then(response => response.json())
      .then(data => data.result)
      .catch(error => {
        console.error("حدث خطأ أثناء استرداد البيانات:", error);
      });
    }

    // استرداد تفاصيل الكويز وعرضها
    // استرداد تفاصيل الكويز وعرضها
function showQuizDetails(quizId) {
  var questionsQuery = "SELECT * FROM quizquestions WHERE quiz_id = ?";
  var choicesQuery = "SELECT * FROM quizchoices WHERE question_id = ?";

  fetchData(questionsQuery, [quizId])
    .then(questionsData => {
      console.log("تفاصيل الكويز:");
      console.log("الأسئلة:", questionsData);

      if (questionsData && questionsData.length > 0) {
        var questionIds = questionsData.map(question => question.question_id);
        var choicesPromises = questionIds.map(questionId => fetchData(choicesQuery, [questionId]));

        Promise.all(choicesPromises)
          .then(choicesData => {
            console.log("الخيارات:", choicesData);
          })
          .catch(error => {
            console.error("حدث خطأ أثناء استرداد الخيارات:", error);
          });
      } else {
        console.log("لا توجد أسئلة لهذا الكويز.");
      }
    })
    .catch(error => {
      console.error("حدث خطأ أثناء استرداد الأسئلة:", error);
    });
}
  </script>
</body>
</html>