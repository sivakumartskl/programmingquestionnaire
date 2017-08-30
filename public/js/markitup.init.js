$(document).ready(function() {
  $('#description').summernote({
  	height: 300,
  	video: false,
  	placeholder: "Write your question description here..."
  });

  $('.replyDescription').summernote({
  	height: 100,
  	video: false,
  	placeholder: "Write your reply here..."
  });
});