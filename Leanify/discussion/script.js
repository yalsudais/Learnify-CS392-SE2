var selectQuesion = [];
var questions = [];

var rightContainer = document.getElementById("right");
var description = document.getElementById("description");
var welcome = document.getElementById("welcome");
var questionItems = document.querySelectorAll(".que-item");
var totalQuestions = 3;

var queTitle = document.getElementById("que-title");
var queText = document.getElementById("que-text");
var responseView = document.getElementById("responses");
var questionView = document.getElementById("questions");
var showWelcomeBtn = document.getElementById("show-welcome");
var addQuestionBtn = document.getElementById("add-que");
var addResponseBtn = document.getElementById("add-res");
var resolveBtn = document.getElementById("resolve");
var search = document.getElementById("search");
var upvote = document.getElementById("upvote");
var downvote = document.getElementById("downvote");
var favorite = document.getElementById("favorite");
var showFavBtn = document.getElementById("show-favorites");

var activeQuestion;

var quesionTitle;
var queseionText;
function setupQuestions() {
	questionItems = $(".que-item");
	questionItems.each(function () {
		$(this).click(function (e) {
			quesionTitle = $(this).data("title");
			queseionText = $(this).data("text");
			selectQuesion.push();
			var quesion_id2 = $(this).attr("id");
			selectQuesion.push();
			selectQuesion.push($(this).data("vote"));
			console.log(activeQuestion);

			queTitle.innerText = quesionTitle;;
			queText.innerText = queseionText;

			// document.getElementById("votes").innerText = selectQuesion[3]
			queTitle.setAttribute("data-quesion_id", quesion_id2);

			var quesion_id = $("#que-title").data("quesion_id");
			loadResponses(quesion_id2);
			showDescription();
		});
	});
}

function loadQuestions() {
	$.ajax({
		type: "post",
		url: "discssion_opertion.php",
		data: { function_name: "select_data" },
		dataType: "json",
		success: function (data) {
			questions = data;
			data.forEach(currentItem => {
				questionView.innerHTML += `<div class="que-item" id="${currentItem.post_id}" data-title="${currentItem.post_title}" data-text="${currentItem.post_text}" data-vote="${currentItem.vote}"><h2 class="que-title">${currentItem.post_title}</h2><p class="que-text">${currentItem.post_text}</p></div>`;

			});
			setupQuestions();
		}
	});



}

function addQuestion(event) {
	event.preventDefault();
	let form = document.getElementById("formAdd");
	let title = form.subject.value;
	let que = form.question.value;
	if (title.length < 1 || que.length < 1) return false;
	totalQuestions++;
	let id = totalQuestions;
	let newQue = {
		id: id,
		title: title,
		text: que,
		votes: 0,
		responses: [],
		resolved: false
	};
	questions[id] = newQue;
	questionView.innerHTML += `<div class="que-item" id="${newQue.id}"><h2 class="que-title">${newQue.title}</h2><p class="que-text">${newQue.text}</p>${(que.favorite) ? "<i class='fa fa-heart active fav'></i>" : "<i></i>"}</div>`;
	setupQuestions();
}

function loadActiveQuestion() {
	// let form = document.getElementById("resForm");


}
function loadResponses(post_id) {
	
	responseView.innerHTML = "";
	$.ajax({
		type: "post",
		url: "discssion_opertion.php",
		data: { function_name: "select_data2", post_id: post_id },
		dataType: "json",
		success: function (response) {
			console.log(response);
			response.forEach((res) => {
				responseView.innerHTML += `<div class="response" >
			<h3 class="res-name">${res.username}</h3>
			<p class="res-text">${res.post_text}</p>
		  </div>
		  <div class="resolve">
			<div class="icons">
			  <i class="fa fa-thumbs-up" id="upvote-${res.post_id}" aria-hidden="true" data-response_id="${res.post_id}"></i>
			  <span id="like-${res.post_id}" class="${(res.user_like === 1) ? 'liked' :''}">${(res.totalelike === undefined) ? '0' : res.total_likes}</span>
			  <i class="fa fa-thumbs-down" id="downvote-${res.post_id}" aria-hidden="true" data-response_id="${res.post_id}"></i>  
			  <span id="dislike-${res.post_id}" class="${(res.user_dislike === 1) ? 'dislike' : ''}">${(res.total_dislikes === undefined) ? '0' : res.total_dislikes}</span>
			</div>
		  </div>`;
			});

			response.forEach((res) => {
				var upvoteIcon = document.getElementById("upvote-" + res.post_id);
				var downvoteIcon = document.getElementById("downvote-" + res.post_id);

				upvoteIcon.addEventListener("click", function () {
					var post_id = $(this).data("response_id");
					var user_id = $("#formAdd").data("user_id");

					if (!user_id) {
						window.location.href = "../login/index.php";
					} else {
						var url = 'discssion_opertion.php'; // Replace with your PHP file URL

						$.ajax({
							url: url,
							method: "POST",
							data: {
								function_name: "addOrUpdateLikeDislike",
								user_id: user_id,
								post_id: post_id,
								like: '1',
								dislike: '0'
							},
							success: function (response) {
								var likeCount = document.getElementById("like-" + post_id);
								var currentLikes = parseInt(likeCount.innerText);

								// Check if the post is already liked
								var isLiked = likeCount.classList.contains("liked");

								// Toggle the like
								if (isLiked) {
									// If already liked, remove the like
									likeCount.classList.remove("liked");
									likeCount.innerText = (currentLikes - 1).toString();
								} else {
									// If not liked, add the like
									likeCount.classList.add("liked");
									likeCount.innerText = (currentLikes + 1).toString();
								}
							},
							error: function (xhr, status, error) {
								console.error("Error liking:", error);
							}
						});
					}
				});

				downvoteIcon.addEventListener("click", function () {
					var post_id = $(this).data("response_id");
					var user_id = $("#formAdd").data("user_id");

					if (!user_id) {
						window.location.href = "../login/index.php";
					} else {
						var url = 'discssion_opertion.php'; // Replace with your PHP file URL

						$.ajax({
							url: url,
							method: "POST",
							data: {
								function_name: "addOrUpdateLikeDislike",
								user_id: user_id,
								post_id: post_id,
								like: '0',
								dislike: '1'
							},
							success: function (response) {
								var dislikeCount = document.getElementById("dislike-" + post_id);

								// Check if the post is already disliked
								var isDisliked = dislikeCount.classList.contains("disliked");

								// Toggle the dislike
								if (isDisliked) {
									// If already disliked, remove the dislike
									dislikeCount.classList.remove("disliked");
									dislikeCount.innerText = (parseInt(dislikeCount.innerText) - 1).toString();
								} else {
									// If not disliked, add the dislike
									dislikeCount.classList.add("disliked");
									dislikeCount.innerText = (parseInt(dislikeCount.innerText) + 1).toString();
								}

							},
							error: function (xhr, status, error) {
								console.error("Error disliking:", error);
							}
						});
					}
				});
			});
		}
	});
}

function addResponse(event) {
	event.preventDefault();
	// let form = document.getElementById("resForm");
	// var user_id=$("#resForm").data("user_id");
	// let comment = form.question.value;
	// if(name.length < 1 || comment.length < 1) return false;
	// let newRes = {
	// 	name: name,
	// 	comment: comment
	// };
	// activeQuestion.responses.push(newRes);

	// form.question.value="";
	loadResponses();
	console.log(questions);
}

function resolveQuestion() {
	delete questions[activeQuestion.id];
	activeQuestion = {};
	loadQuestions();
	showWelcome();
}
function searchQuery() {
    const query = search.value.toLowerCase();
    console.log(query);

    const matchingQuestions = questions.filter((question) => {
        const titleMatch = question.post_title.toLowerCase().includes(query);
        const textMatch = question.post_text.toLowerCase().includes(query);
        return titleMatch || textMatch;
    });

    console.log("Matching Questions: ", matchingQuestions);

    if (matchingQuestions.length === 0) {
        questionView.innerHTML = `<div class="que-item"><h2>No match found!</h2></div>`;
    } else {
        questionView.innerHTML = "";
        matchingQuestions.forEach((question) => {
            const { post_id, post_title, post_text, favorite } = question;
            const highlightedTitle = post_title.replace(new RegExp(query, 'gi'), '<span class="yellow">$&</span>');
            const highlightedText = post_text.replace(new RegExp(query, 'gi'), '<span class="yellow">$&</span>');
            const favoriteIcon = favorite ? "<i class='fa fa-heart active fav'></i>" : "<i></i>";
            const questionItem = `
                <div class="que-item" id="${post_id}" data-title="${post_title}" data-text="${post_text}">
                    <h2 class="que-title">${highlightedTitle}</h2>
                    <p class="que-text">${highlightedText}</p>
                    ${favoriteIcon}
                </div>
            `;
            questionView.innerHTML += questionItem;
        });
        setupQuestions();
    }
}

function showDescription() {
	welcome.style.display = "none";
	description.style.display = "block";
	loadActiveQuestion();
	// setFavorite();
}

function showWelcome() {
	description.style.display = "none";
	welcome.style.display = "block";
	let form = document.getElementById("formAdd");
	form.subject.value = "";
	form.question.value = "";
}

function upVote() {
}

function downVote() {


}

function setFavorite() {
	if (activeQuestion.favorite)
		favorite.classList.add("active");
	else
		favorite.classList.remove("active");
}

function addFavorite() {
	activeQuestion.favorite = !activeQuestion.favorite;
	if (activeQuestion.favorite)
		favorite.classList.add("active");
	else
		favorite.classList.remove("active");
	loadQuestions();
}

function showFavorite() {
	if (this.innerText == "View All") {
		loadQuestions();
		this.innerText = "Favorites";
		return;
	}
	//else
	this.innerText = "View All";
	let data = [];
	questionView.innerText = "";
	for (let queNo in questions) {
		let question = questions[queNo];
		if (question.favorite)
			data.push(question);
		// questionView.innerHTML += `<div class="que-item" id="${queNo}"><h2 class="que-title">${question.title}</h2><p class="que-text">${question.text}</p></div>`;
	}
	data.sort((a, b) => {
		return b.votes - a.votes;
	});
	data.forEach((que) => {
		questionView.innerHTML += `<div class="que-item" id="${que.id}"><h2 class="que-title">${que.title}</h2><p class="que-text">${que.text}</p>${(que.favorite) ? "<i class='fa fa-heart active fav'></i>" : "<i></i>"}</div>`;
	})
	console.log(data);
	setupQuestions();
}

function init() {
	loadQuestions();
	showWelcomeBtn.addEventListener("click", showWelcome);
	// addQuestionBtn.addEventListener("click", addQuestion2);
	addResponseBtn.addEventListener("click", addResponse);
	// resolveBtn.addEventListener("click", resolveQuestion);
	search.addEventListener("keyup", searchQuery);
	// upvote.addEventListener("click", upVote);
	// downvote.addEventListener("click", downVote);
	// favorite.addEventListener("click", addFavorite);
	// showFavBtn.addEventListener("click", showFavorite);
}

$(document).ready(function () {
	$('#add-res').click(function (e) {
		e.preventDefault(); // Prevent form submission

		var formdata = new FormData($("#resForm")[0]);
		var user_id = $("#resForm").data("user_id");

		if (user_id == "") {
			window.location.href("../login/index.php");
		}

		var quesion_id = $("#que-title").data("quesion_id");
		alert(quesion_id);
		formdata.append("post_id_f", quesion_id);
		formdata.append("function_name", "add_discussionposts2")
		var url = 'discssion_opertion.php'; // Replace with your PHP file URL

		$.ajax({
			type: 'POST',
			url: url,
			data: formdata,
			processData: false,
			contentType: false,
			success: function (response) {
				loadResponses(quesion_id);
				// Request completed successfully
				console.log(response);
				// Handle the response from the PHP file
				// ...
			},
			error: function (xhr, status, error) {
				// Handle errors

			}
		});
	});
});
document.addEventListener('DOMContentLoaded', function () {
	var formAdd = document.getElementById('formAdd');
	formAdd.addEventListener('submit', function (event) {
		event.preventDefault();
		var formdata = new FormData($("#formAdd")[0]);
		var user_id = $("#formAdd").data("user_id");
		if (!user_id) {
			alert("You must log in");
			window.location.href = "../login/index.php";
		}

		var quesion_id = $("#que-title").data("quesion_id");

		formdata.append("function_name", "add_discussionposts")
		var url = 'discssion_opertion.php'; // Replace with your PHP file URL

		$.ajax({
			type: 'POST',
			url: url,
			data: formdata,
			processData: false,
			contentType: false,
			success: function (response) {
				$("#subject_text").val("");
				$("#quesion_text").val("");
				loadResponses(quesion_id);
				formd.subject.value = "";
				formd.question.value = "";
				// Request completed successfully
				console.log(response);
				// Handle the response from the PHP file
				// ...
			},
			error: function (xhr, status, error) {
				// Handle errors

			}
		});
	});
});

// function addQuestion2() 
// {

// 	var quesion_id = $("#que-title").data("quesion_id");

// 	var quesion_text=$("#quesion_text").val();
// 	var subject_text=$("#subject_text").val();
// 	$.ajax({
// 		type: 'POST',
// 		url: url,
// 		data: {subject:subject_text,question:quesion_text},
// 		processData: false,
// 		contentType: false,
// 		success: function (response) {
// 		
// 			loadResponses(quesion_id);
// 			formd.subject.value = "";
// 			formd.question.value = "";
// 			// Request completed successfully
// 			console.log(response);
// 			// Handle the response from the PHP file
// 			// ...
// 		},
// 		error: function (xhr, status, error) {
// 			// Handle errors

// 		}
// 	});

//   }

$(document).ready(function () {
	$('[id^="downvote-"]').click(function () {
		console.log("successfull");
		// Like button click event
		downVote();
	});

	// Dislike button click event
	$('[id^="upvote-"]').click(function () {
		upVote();
	});
});
init();